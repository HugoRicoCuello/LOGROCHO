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
            <div class="columnas">
                <input type="checkbox" id="ID" name="ID" value="ID" onclick="ocultaColumnas(1)" checked>
                <label for="ID">ID</label>
                <input type="checkbox" id="nombre" name="nombre" value="nombre" onclick="ocultaColumnas(2)" checked>
                <label for="nombre">Nombre</label>
                <input type="checkbox" id="puntuacion" name="puntuacion" value="puntuacion" onclick="ocultaColumnas(3)" checked>
                <label for="puntuacion">Puntuacion</label>
                <input type="checkbox" id="latitud" name="latitud" value="latitud" onclick="ocultaColumnas(4)" checked>
                <label for="latitud">Latitud</label>
                <input type="checkbox" id="longitud" name="longitud" value="longitud" onclick="ocultaColumnas(5)" checked>
                <label for="longitud">Longitud</label>
            </div>
            <button type="button" class="btn btn-success nuevo" data-bs-toggle="modal" data-bs-target="#nuevoBar">
                NUEVO
            </button>
        </div>
        <table class=" table table-hover table-bordered" id="tablaBares">
            <thead>
                <tr>
                    <th scope="col" id="0" onclick="ordenaTabla(0,'int')">ID</th>
                    <th scope="col" id="1" onclick="ordenaTabla(1,'str')">Nombre</th>
                    <th scope="col" id="2" onclick="ordenaTabla(2,'int')">Puntuacion</th>
                    <th scope="col" id="3" onclick="ordenaTabla(3,'int')">Latitud</th>
                    <th scope="col" id="4" onclick="ordenaTabla(4,'int')">Longitud</th>
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
                    <form action="<?php echo $rutaVista ?>index.php/altaBar" method="POST" enctype="multipart/form-data">
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
                            <input type="file" class="form-control-file" id="file" name="file[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
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
                        tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='nombre'>" + response[i].nombre + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='lat'>" + response[i].latitud + "</td><td class='lon'>" + response[i].longitud);
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
                        tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='nombre'>" + response[i].nombre + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='lat'>" + response[i].latitud + "</td><td class='lon'>" + response[i].longitud);
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
                            tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='nombre'>" + response[i].nombre + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='lat'>" + response[i].latitud + "</td><td class='lon'>" + response[i].longitud);
                        }
                    } else {
                        pag -= valor;
                    }
                }
            });
        }

        function verFicha(tr) {
            let puntuacion = tr.getElementsByClassName("puntuacion")[0].innerHTML;
            let nombre = tr.getElementsByClassName("nombre")[0].innerHTML;
            let lat = tr.getElementsByClassName("lat")[0].innerHTML;
            let lon = tr.getElementsByClassName("lon")[0].innerHTML;
            let id = tr.getElementsByClassName("id")[0].innerHTML;

            window.location = "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/fichaBar?puntuacion=" + puntuacion + "&nombre=" + nombre + "&lat=" + lat + "&lon=" + lon + "&id=" + id;
        }

        /**
         * Funcion para ordenar una tabla... tiene que recibir el numero de columna a
         * ordenar y el tipo de orden
         * @param int id_columna
         * @param str orden - ['str'|'int']
         */
        function ordenaTabla(id_columna, orden) {
            var tabla, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

            tabla = document.getElementById("tablaBares");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";

            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = tabla.rows;
                /*Loop through all table rows (except the first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare, one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("td")[id_columna];
                    y = rows[i + 1].getElementsByTagName("td")[id_columna];
                    /*check if the two rows should switch place, based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if ((orden == "str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (orden == "int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if ((orden == "str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (orden == "int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        function ocultaColumnas(id_columna) {
            $('td:nth-child(' + id_columna + ')').toggle();
            $('th:nth-child(' + id_columna + ')').toggle();
        }
    </script>