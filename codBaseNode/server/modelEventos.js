let mongoose = require('mongoose'), 
    Schema = mongoose.Schema, 

    EventSchema = new Schema({ 
        title: { type: String, required: true }, 
        start: { type: String, required: true }, //Inicio del evento - Obligatorio
        end: { type: String, required: false }, //Finalizacion del evento - No obligatorio
        user: { type: Schema.ObjectId, ref: "Usuario" }
    });

let EventoModel = mongoose.model('Evento', EventSchema)
module.exports = EventoModel 
