<!DOCTYPE html>
<html lang="es
">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Puntuacion</th>
                <th scope="col">Latidud</th>
                <th scope="col">Longitud</th>
            </tr>
        </thead>
        <tbody id="myTable">
        </tbody>
    </table>



    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        window.onload = function() {
            pintarTabla();
        }
        let pag;
        function pintarTabla() {
            let tabla = $("#myTable");
            pag = 0;
            $.ajax({
                type: "GET",
                url: "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneBar/10",
                dataType: "json",
                success: function(response) {
                    tabla.html("");
                    for (let i = 0; i < 1; i++) {
                        tabla.append("<tr><td onclick=''>" + response[i].id + "</td><td onclick=''>" + response[i].nombre + "</td><td onclick=''>" + response[i].puntuacion + "</td><td onclick=''>" + response[i].latitud + "</td><td onclick=''>" + response[i].longitud + "</td></tr>");
                    }
                }
            });
        }
    </script>
</body>

</html>