
var Usuario = require('./modelUsuarios.js')
module.exports.crearUsuarioDemo = function (callback) {
    var arr = [{ email: 'daniel@mail.com', user: "Daniel", password: "12" }, { email: 'daniel@mail.com', user: "Daniel", password: "12" }]; 

    Usuario.insertMany(arr, function (error, docs) { 
        if (error) { 
            if (error.code == 11000) { 
                callback("Utilice los siguientes datos: </br>usuario: daniel || password:12 </br>usuario: caqui | password:12") 
            } else {
                callback(error.message)
            }
        } else {
            callback(null, "El usuario 'Daniel' y 'Noel' se ha registrado correctamente. </br>usuario: Daniel | password:12 </br >usuario: Noel | password:12") 
        }
    });
}
