<?php
// Aquí puedes manejar la lógica de envío del formulario si es necesario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar datos en base de datos o procesar los datos aquí
    $dimension_programa = $_POST['dimension_programa'] ?? '';
    $name1 = $_POST['name1'] ?? '';
    $actividad = $_POST['actividad'] ?? '';
    $observacion = $_POST['observacion'] ?? '';
    $colec = $_POST['colec'] ?? '';
    $tperson = $_POST['tperson'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $colonia = $_POST['colonia'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    // Procesa los datos aquí o guarda en base de datos
    // Ejemplo:
    // $query = "INSERT INTO tabla (dimension_programa, name1, actividad, observacion, ...) VALUES (...)";
    // Ejecutar la consulta para guardar los datos
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map;
        let marker;

        function initMap() {
            const tlalpanCoords = { lat: 19.287860, lng: -99.171360 };
            map = L.map('map').setView([tlalpanCoords.lat, tlalpanCoords.lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            marker = L.marker([tlalpanCoords.lat, tlalpanCoords.lng], {draggable: true}).addTo(map);

            marker.on('dragend', function(event) {
                const position = marker.getLatLng();
                updateLocation(position);
            });
        }

        function updateLocation(location) {
            document.getElementById('ubicacion').value = location.lat + ', ' + location.lng;
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${location.lat}&lon=${location.lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data.address) {
                        const address = `${data.address.road || ''}, ${data.address.suburb || ''}, ${data.address.city || ''}, ${data.address.state || ''}, ${data.address.country || ''}`;
                        document.getElementById('direccion').value = address;
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function toggleMap() {
            const mapContainer = document.getElementById('map-container');
            if (mapContainer.style.display === 'none' || mapContainer.style.display === '') {
                mapContainer.style.display = 'block';
                initMap();
            } else {
                mapContainer.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('map-container').style.display = 'none';
        });

        document.addEventListener('DOMContentLoaded', function() {
            const selectDimension = document.getElementById('dimension_programa');
            const facilitadoresDiv = document.getElementById('facilitadores');
            const colectivosDiv = document.getElementById('colectivos');

            selectDimension.addEventListener('change', function() {
                facilitadoresDiv.style.display = this.value === 'facilitadores' ? 'block' : 'none';
                colectivosDiv.style.display = this.value === 'colectivos' ? 'block' : 'none';
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <form class="miFormulario" method="POST">
            <div class="row">
                <div class="column">
                    <h2 class="title">Formulario de Datos</h2>
                    <h3 class="titles">Apoyo para el bienestar 2025</h3>
                    <div class="form-group">
                        <label for="dimension_programa">Dimensión del Programa:</label>
                        <select id="dimension_programa" name="dimension_programa">
                            <option value="">Seleccione una dimensión</option>
                            <option value="beneficiario">Beneficiario Directo</option>
                            <option value="facilitadores">Facilitadores</option>
                            <option value="colectivos">Colectivos</option>
                            <option value="usuarios">Usuarios</option>
                            <option value="otra">Otra</option>
                        </select>
                    </div>
                    <div id="facilitadores" class="hidden" style="display: none;">
                        <h3>Facilitadores</h3>
                        <div class="form-group">
                            <label for="name1">Persona médica:</label>
                            <input type="text" id="name1" name="name1" value="<?php echo htmlspecialchars($name1 ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="actividad">Actividad:</label>
                            <select id="actividad" name="actividad">
                                <option value="">--Seleccione una actividad--</option>
                                <option value="actividad1" <?php echo ($actividad == 'actividad1') ? 'selected' : ''; ?>>Consulta médica</option>
                                <option value="actividad2" <?php echo ($actividad == 'actividad2') ? 'selected' : ''; ?>>Reposición de cita</option>
                                <option value="actividad3" <?php echo ($actividad == 'actividad3') ? 'selected' : ''; ?>>Urgencia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observaciones:</label>
                            <textarea id="observacion" name="observacion" rows="4"><?php echo htmlspecialchars($observacion ?? ''); ?></textarea>
                        </div>
                    </div>
                    <div id="colectivos" class="hidden" style="display: none;">
                        <h3>Colectivos</h3>
                        <div class="form-group">
                            <label for="colec">Colectivo:</label>
                            <select id="colec" name="colec">
                                <option value="">Seleccione un colectivo</option>
                                <option value="Tlalpan1" <?php echo ($colec == 'Tlalpan1') ? 'selected' : ''; ?>>Tlalpan 1</option>
                                <option value="Tlalpan2" <?php echo ($colec == 'Tlalpan2') ? 'selected' : ''; ?>>Tlalpan 2</option>
                                <option value="Tlalpan3" <?php echo ($colec == 'Tlalpan3') ? 'selected' : ''; ?>>Tlalpan 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tperson">Persona representante:</label>
                            <select id="tperson" name="tperson">
                                <option value="">Seleccione una persona</option>
                                <option value="persona1" <?php echo ($tperson == 'persona1') ? 'selected' : ''; ?>>Coordinador</option>
                                <option value="persona2" <?php echo ($tperson == 'persona2') ? 'selected' : ''; ?>>Integrante</option>
                                <option value="persona3" <?php echo ($tperson == 'persona3') ? 'selected' : ''; ?>>Usuario</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h3>Datos de la persona beneficiaria</h3>
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($nombre ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required value="<?php echo htmlspecialchars($apellido ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo">
                            <option value="hombre" <?php echo ($sexo == 'hombre') ? 'selected' : ''; ?>>Hombre</option>
                            <option value="mujer" <?php echo ($sexo == 'mujer') ? 'selected' : ''; ?>>Mujer</option>
                            <option value="otro" <?php echo ($sexo == 'otro') ? 'selected' : ''; ?>>Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($fecha_nacimiento ?? ''); ?>">
                    </div>
                    <div class="flex">
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <select id="colonia" name="colonia">
                                <option value="">Seleccione una colonia</option>
                                <option value="MESA LOS HORNOS" <?php echo ($colonia == 'MESA LOS HORNOS') ? 'selected' : ''; ?>>MESA LOS HORNOS, TEXCALTENCO</option>
                                <option value="MIRADOR" <?php echo ($colonia == 'MIRADOR') ? 'selected' : ''; ?>>MIRADOR 1A SECC</option>
                                <option value="LA PRIMAVERA" <?php echo ($colonia == 'LA PRIMAVERA') ? 'selected' : ''; ?>>LA PRIMAVERA</option>
                                <option value="DIAMANTE" <?php echo ($colonia == 'DIAMANTE') ? 'selected' : ''; ?>>DIAMANTE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ubicacion">Ubicación (Arrastra el PIN AZUL):</label>
                        <input type="text" id="ubicacion" name="ubicacion" readonly value="<?php echo htmlspecialchars($ubicacion ?? ''); ?>">
                        <button type="button" onclick="toggleMap()">Seleccionar Ubicación</button>
                        <div id="map-container">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" readonly value="<?php echo htmlspecialchars($direccion ?? ''); ?>">
                    </div>

                    <button type="submit" class="btn">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
