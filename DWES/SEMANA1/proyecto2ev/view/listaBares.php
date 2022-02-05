    <link rel="stylesheet" href="../css/listados.css">
    <div class="tabla">
        <div class="cabecera">
            <h2>BARES</h2>
            <select id="select" onchange="pintarTabla()">
                <option value="3" selected>de 3 en 3</option>
                <option value="5">de 5 en 5</option>
                <option value="10">todos</option>
            </select>
            <input type="text" class="buscador" placeholder="buscar...">
            <button type="button" class="btn btn-success nuevo" data-bs-toggle="modal" data-bs-target="#nuevoBar">
                NUEVO
            </button>
        </div>
        <table class=" table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puntuacion</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                </tr>
            </thead>
            <tbody id="myTable">
            </tbody>
        </table>
        <div class="botones">
            <button onclick="anterior()" class="anterior btn btn-dark">Anterior</button>
            <button onclick="siguiente()" class="siguiente btn btn-dark">Siguiente</button>
        </div>
    </div>
    <div class="modal fade" id="nuevoBar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="formulario modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">NUEVO BAR</h2>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $rutaVista ?>index.php/altaBar" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Introduce el nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input type="text" class="form-control" id="latitud" placeholder="Latitud" name="latitud">
                        </div>
                        <div class="mb-3">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input type="text" class="form-control" id="longitud" placeholder="Longitud" name="longitud">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Seleccionar Archivos</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        window.onload = function() {
            pintarTabla();
        }
        let pag;

        function pintarTabla() {
            let tabla = $("#myTable");
            let valor = parseInt($("#select").val());
            pag = 0;
            $.ajax({
                type: "GET",
                url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneBares/" + pag + "/" + valor,
                dataType: "json",
                success: function(response) {
                    tabla.html("");
                    for (let i = 0; i < response.length; i++) {
                        tabla.append("<tr><td onclick=''>" + response[i].id + "</td><td onclick=''>" + response[i].nombre + "</td><td onclick=''>" + response[i].puntuacion + "</td><td onclick=''>" + response[i].latitud + "</td><td onclick=''>" + response[i].longitud);
                    }
                }
            });
        }

        function anterior() {
            let tabla = $("#myTable");
            let valor = parseInt($("#select").val());
            if ((pag - valor) >= 0) {
                pag = pag - valor;
            }
            $.ajax({
                type: "GET",
                url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneBares/" + pag + "/" + valor,
                dataType: "json",
                success: function(response) {
                    tabla.html("");
                    for (let i = 0; i < response.length; i++) {
                        tabla.append("<tr><td onclick=''>" + response[i].id + "</td><td onclick=''>" + response[i].nombre + "</td><td onclick=''>" + response[i].puntuacion + "</td><td onclick=''>" + response[i].latitud + "</td><td onclick=''>" + response[i].longitud);
                    }
                }
            });
        }

        function siguiente() {
            let tabla = $("#myTable");
            let valor = parseInt($("#select").val());
            pag += valor;
            $.ajax({
                type: "GET",
                url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneBares/" + pag + "/" + valor,
                dataType: "json",
                success: function(response) {
                    if (response.length != 0) {
                        tabla.html("");
                        for (let i = 0; i < response.length; i++) {
                            tabla.append("<tr><td onclick=''>" + response[i].id + "</td><td onclick=''>" + response[i].nombre + "</td><td onclick=''>" + response[i].puntuacion + "</td><td onclick=''>" + response[i].latitud + "</td><td onclick=''>" + response[i].longitud);
                        }
                    } else {
                        pag -= valor;
                    }
                }
            });
        }
    </script>