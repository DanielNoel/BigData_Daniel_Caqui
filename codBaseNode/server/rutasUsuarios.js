const Router = require('express').Router();
const Usuarios = require('./modelUsuarios.js')
const Eventos = require('./modelEventos.js')
const Operaciones = require('./crud.js')
Router.get('/ciber', function (req, res) {
    Usuarios.find({ user: req.session.user }).count({}, function (err, count) {
        if (count > 0) {
            res.send(" ");
        } else {
            res.send("Utilice los siguientes datos: </br>usuario: daniel ||| password:12");
        }
    })
})
Router.post('/login', function (req, res) {
    let user = req.body.user
    let password = req.body.pass,
        sess = req.session;
    Usuarios.find({ user: user }).count({}, function (err, count) {
        if (err) {
            res.status(500)
            res.json(err)
        } else {
            if (count == 1) {
                Usuarios.find({ user: user, password: password }).count({}, function (err, count) {
                    if (err) {
                        res.status(500)
                        res.json(err)
                    } else {
                        if (count == 1) {
                            sess.user = req.body.user;
                            res.send("Validado")
                        } else {
                            res.send("Contraseña incorrecta")
                        }
                    }
                })
            } else {
                res.send("Usuario no registrado")
            }
        }

    })
})
Router.post('/logout', function (req, res) {
    req.session.destroy(function (err) {
        if (err) {
            console.log(err);
            res.json(err)
        } else {
            req.session = null
            res.send('logout')
            res.end()
        }
    });
});

Router.all('*', function (req, res) {
    res.send('Error al mostrar el recurso solicitado. Por favor verifique la dirección url a la cual desea ingresar')
    res.end()
})

module.exports = Router 
