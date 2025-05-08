const express = require('express');
const cors = require('cors');
const app = express();
const port = 3000;

app.use(cors()); 
app.use(express.json());

let solicitudes = [
    { id: 1, fecha_solicitud: '2025-05-01', fecha_inicio: '2025-05-10', fecha_fin: '2025-05-15', motivo: 'Vacaciones', estado: 'Pendiente' },
    { id: 2, fecha_solicitud: '2025-05-03', fecha_inicio: '2025-05-20', fecha_fin: '2025-05-22', motivo: '', estado: 'Aprobado' }
];

app.get('/obtener_solicitud', (req, res) => {
    res.json(solicitudes);
});

app.post('/eliminar_solicitud', (req, res) => {
    const { id } = req.body;
    solicitudes = solicitudes.filter(s => s.id !== id);
    res.json({ success: true });
});

app.listen(port, () => {
    console.log(`API escuchando en http://localhost:3000`);
});
