<?php
session_start();

//Incluyo los archivos necesarios para el funcionamiento del programa
require_once("controllers/loginController.php");
require_once("controllers/conexion.php");
require_once("controllers/barController.php");
require_once("controllers/pinchoController.php");
require_once("controllers/userController.php");
require_once("controllers/resegnaController.php");
require_once("controllers/frontController.php");
require_once("repository/bd.php");

//ruta relativa
$ruta_actual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$ruta_rel = explode("index.php", $ruta_actual)[0];

//ruta home
$home = $ruta_rel . "index.php/";
$ruta = str_replace($home, "", $ruta_actual);

//array de la ruta
$array_ruta = explode("/", $ruta);

//controladores
$loginController = new loginController($ruta_rel);
$barController = new barController($ruta_rel);
$pinchoController = new pinchoController($ruta_rel);
$userController = new userController($ruta_rel);
$resegnaController = new resegnaController($ruta_rel);
$frontController = new frontController($ruta_rel);

$accion = $array_ruta[0];
$accion = explode("?", $accion)[0];

//Trato la accion
switch ($accion) {
    case 'login':
        if (isset($_GET["error"])) {
            $loginController->muestraLogin($_GET["error"]);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'loginDestino':
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $loginController->compruebaLogin($email, $pass);
        break;
    case 'administracion':
        $loginController->muestraAdministracion();
        break;
    case 'home':
        $frontController->muestraHome();
        break;
    case 'bares':
        $frontController->muestraBares();
        break;
    case 'pinchos':
        $frontController->muestraPinchos();
        break;
    case 'altaBar':
        $nombre = $_POST["nombre"];
        $lat = $_POST["latitud"];
        $long = $_POST["longitud"];
        $barController->altaBar($nombre, $lat, $long);
        break;
    case 'bajaBar':
        $barController->bajaBar(8);
        break;
    case 'modificaBar':
        $barController->modificaBar(9, "casa alvaro", 1.3, 10, 10);
        break;
    case 'obtieneBares':
        $limite = $array_ruta[1];
        $numero = $array_ruta[2];
        $barController->obtieneBares($limite, $numero);
        break;
    case 'altaPincho':
        $nombre = $_POST["nombre"];
        $bar = $_POST["bar"];
        $imagenes = $_FILES["file"]["name"];
        $pinchoController->altaPincho($nombre, $bar, $imagenes);
        break;
    case 'bajaPincho':
        $pinchoController->bajaPincho(1);
        break;
    case 'modificaPincho':
        $pinchoController->modificaPincho(1, "pincho tortilla", 5);
        break;
    case 'obtienePinchos':
        $limite = $array_ruta[1];
        $numero = $array_ruta[2];
        $pinchoController->obtienePinchos($limite, $numero);
        break;;
    case 'altaUsuario':
        $email = $_POST["correo"];
        $password = $_POST["password"];
        $userController->altaUsuario($email, $password);
        break;
    case 'bajaUsuario':
        $userController->bajaUsuario(3);
        break;
    case 'modificaUsuario':
        $userController->modificaUsuario(3, "email2@email.com", "Admin12345", "true");
        break;
    case 'obtieneUsuarios':
        $limite = $array_ruta[1];
        $numero = $array_ruta[2];
        $userController->obtieneUsuarios($limite, $numero);
        break;
    case 'altaResegna':
        $puntuacion = $_POST["puntuacion"];
        $descripcion = $_POST["descripcion"];
        $usuario = $_POST["usuario"];
        $pincho = $_POST["pincho"];
        $resegnaController->altaResegna($puntuacion, $descripcion, $usuario, $pincho);
        break;
    case 'bajaResegna':
        $id = $array_ruta[1];
        $resegnaController->bajaResegna($id);
        break;
    case 'fichaResegna':
        $puntuacion = $_GET["puntuacion"];
        $descripcion = $_GET["descripcion"];
        $usuario = $_GET["usuario"];
        $pincho = $_GET["pincho"];
        $id = $_GET["id"];
        $resegnaController->verFichaResegna($puntuacion, $descripcion, $usuario, $pincho, $id);
        break;
        /*case 'modificaResegna':
        $resegnaController->verFichaResegna();
        break;*/
    case 'obtieneResegnas':
        $limite = $array_ruta[1];
        $numero = $array_ruta[2];
        $resegnaController->obtieneResegnas($limite, $numero);
        break;
    default:
        header("Location: " . $home . "home");
        break;
}
