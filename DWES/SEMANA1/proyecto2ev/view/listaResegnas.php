<link rel="stylesheet" href="../css/listados.css">
<div class="tabla">
    <div class="cabecera">
        <h2>RESEÑAS</h2>
        <select id="select" onchange="pintarTabla()">
            <option value="3" selected>de 3 en 3</option>
            <option value="5">de 5 en 5</option>
            <option value="10">todos</option>
        </select>
        <input type="text" class="buscador" placeholder="buscar...">
        <button type="button" class="btn btn-success nuevo" data-bs-toggle="modal" data-bs-target="#nuevaResegna">
            NUEVO
        </button>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Puntuacion</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Usuario</th>
                <th scope="col">Pincho</th>
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

<div class="modal fade" id="nuevaResegna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="formulario modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">NUEVA RESEÑA</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo $rutaVista ?>index.php/altaResegna" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="puntuacion" class="form-label">Puntuacion</label>
                        <input type="number" step="any" class="form-control" id="puntuacion" placeholder="Introduce la puntuacion" name="puntuacion">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" placeholder="Introduce la descripcion" name="descripcion">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <select name="usuario" id="usuario">
                            <?php
                            $emails = $bd->obtieneTodosUsuarios();
                            foreach ($emails as $email) {
                                $correo = $bd->obtieneCorreoUsuario($email[0]);
                                $id = $bd->obtieneIdUsuario($correo[0]);
                                echo '<option value="' . $id[0] . '">' . $correo[0] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="pincho" class="form-label">Pincho</label>
                        <select name="pincho" id="pincho">
                            <?php
                            $pinchos = $bd->obtieneTodosPinchos();
                            foreach ($pinchos as $pincho) {
                                $nombre = $bd->obtieneNombrePincho($pincho[0]);
                                $id = $bd->obtieneIdPincho($nombre[0]);
                                echo '<option value="' . $id[0] . '">' . $nombre[0] . '</option>';
                            }
                            ?>
                        </select>
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
            url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneResegnas/0/" + valor,
            dataType: "json",
            success: function(response) {
                tabla.html("");
                for (let i = 0; i < response.length; i++) {
                    tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='descripcion'>" + response[i].descripcion + "</td><td class='usuario'>" + response[i].usuario + "</td><td class='pincho'>" + response[i].pincho + "</td></tr>");
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
            url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneResegnas/" + pag + "/" + valor,
            dataType: "json",
            success: function(response) {
                tabla.html("");
                for (let i = 0; i < response.length; i++) {
                    tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='descripcion'>" + response[i].descripcion + "</td><td class='usuario'>" + response[i].usuario + "</td><td class='pincho'>" + response[i].pincho + "</td></tr>");
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
            url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneResegnas/" + pag + "/" + valor,
            dataType: "json",
            success: function(response) {
                if (response.length != 0) {
                    tabla.html("");
                    for (let i = 0; i < response.length; i++) {
                        tabla.append("<tr onclick='verFicha(this)'><td class='id'>" + response[i].id + "</td><td class='puntuacion'>" + response[i].puntuacion + "</td><td class='descripcion'>" + response[i].descripcion + "</td><td class='usuario'>" + response[i].usuario + "</td><td class='pincho'>" + response[i].pincho + "</td></tr>");
                    }
                } else {
                    pag -= valor;
                }
            }
        });
    }

    function verFicha(tr) {
        let puntuacion = tr.getElementsByClassName("puntuacion")[0].innerHTML;
        let descripcion = tr.getElementsByClassName("descripcion")[0].innerHTML;
        let usuario = tr.getElementsByClassName("usuario")[0].innerHTML;
        let pincho = tr.getElementsByClassName("pincho")[0].innerHTML;
        let id = tr.getElementsByClassName("id")[0].innerHTML;

        window.location = "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/fichaResegna?puntuacion=" + puntuacion + "&descripcion=" + descripcion + "&usuario=" + usuario + "&pincho=" + pincho + "&id=" + id;
    }
</script>