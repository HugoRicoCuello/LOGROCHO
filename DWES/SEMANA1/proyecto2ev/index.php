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
    case 'login2':
        if (isset($_GET["error"])) {
            $loginController->muestraLogin2($_GET["error"]);
        } else {
            $loginController->muestraLogin2();
        }
        break;
    case 'loginDestino':
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $loginController->compruebaLogin($email, $pass);
        break;
    case 'loginDestino2':
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $loginController->compruebaLogin2($email, $pass);
        break;
    case 'cerrarSesion':
        $loginController->cerrarSesion();
        break;
    case 'cerrarSesion2':
        $loginController->cerrarSesion2();
        break;
    case 'registro':
        $loginController->muestraRegistro();
        break;
    case 'registroDestino':
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $pass2 =  $_POST["pass2"];
        $loginController->compruebaRegistro($email, $pass, $pass2);
        break;
    case 'administracion':
        if (isset($_SESSION["user"])) {
            $loginController->muestraAdministracion();
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'home':
        $frontController->muestraHome();
        break;
    case 'pinchos':
        if (isset($_SESSION["user"])) {
            $frontController->muestraPinchos();
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'altaBar':
        if (isset($_SESSION["user"])) {
            $nombre = $_POST["nombre"];
            $lat = $_POST["latitud"];
            $long = $_POST["longitud"];
            $imagenes = $_FILES["file"]["name"];
            $barController->altaBar($nombre, $lat, $long, $imagenes);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'bajaBar':
        if (isset($_SESSION["user"])) {
            $id = $array_ruta[1];
            $barController->bajaBar($id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'modificaBar':
        if (isset($_SESSION["user"])) {
            $id = $_GET["id_bar"];
            $nombre = $_GET["nombre"];
            $lat = $_GET["lat"];
            $lon = $_GET["lon"];
            $puntuacion = $_GET["puntuacion"];
            $barController->modificaBar($id, $nombre, $puntuacion, $lat, $lon);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'fichaBar':
        if (isset($_SESSION["user"])) {
            $nombre = $_GET["nombre"];
            $lat = $_GET["lat"];
            $lon = $_GET["lon"];
            $puntuacion = $_GET["puntuacion"];
            $id = $_GET["id"];
            $barController->verFichaBar($nombre, $puntuacion, $lat, $lon, $id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'obtieneBares':
        $limite = $array_ruta[1];
        $numero = $array_ruta[2];
        $barController->obtieneBares($limite, $numero);
        break;
    case 'altaPincho':
        if (isset($_SESSION["user"])) {
            $nombre = $_POST["nombre"];
            $bar = $_POST["bar"];
            $imagenes = $_FILES["file"]["name"];
            $pinchoController->altaPincho($nombre, $bar, $imagenes);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'bajaPincho':
        if (isset($_SESSION["user"])) {
            $id = $array_ruta[1];
            $pinchoController->bajaPincho($id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'modificaPincho':
        if (isset($_SESSION["user"])) {
            $id = $_GET["id_pincho"];
            $bar = $_GET["bar"];
            $nombre = $_GET["nombre"];
            $pinchoController->modificaPincho($id, $nombre, $bar);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'obtienePinchos':
        if (isset($_SESSION["user"])) {
            $limite = $array_ruta[1];
            $numero = $array_ruta[2];
            $pinchoController->obtienePinchos($limite, $numero);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'fichaPincho':
        if (isset($_SESSION["user"])) {
            $nombre = $_GET["nombre"];
            $bar = $_GET["bar"];
            $id = $_GET["id"];
            $pinchoController->verFichaPincho($nombre, $bar, $id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'altaUsuario':
        if (isset($_SESSION["user"])) {
            $email = $_POST["correo"];
            $password = $_POST["password"];
            $userController->altaUsuario($email, $password);
        } else {
            $loginController->muestraLogin();
        }

        break;
    case 'bajaUsuario':
        if (isset($_SESSION["user"])) {
            $id = $array_ruta[1];
            $userController->bajaUsuario($id);
        } else {
            $loginController->muestraLogin();
        }

        break;
    case 'modificaUsuario':
        if (isset($_SESSION["user"])) {
            $pwd = $_GET["pwd"];
            $admin = $_GET["admin"];
            if ($admin == 1) {
                $admin = "true";
            } else {
                $admin = "false";
            }
            $email = $_GET["email"];
            $id = $_GET["id_usuario"];
            $userController->modificaUsuario($id, $email, $password, $admin);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'obtieneUsuarios':
        if (isset($_SESSION["user"])) {
            $limite = $array_ruta[1];
            $numero = $array_ruta[2];
            $userController->obtieneUsuarios($limite, $numero);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'fichaUsuario':
        if (isset($_SESSION["user"])) {
            $pwd = $_GET["pwd"];
            $admin = $_GET["admin"];
            $email = $_GET["email"];
            $id = $_GET["id"];
            $userController->verFichaUsuario($pwd, $admin, $email, $id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'altaResegna':
        if (isset($_SESSION["user"])) {
            $puntuacion = $_POST["puntuacion"];
            $descripcion = $_POST["descripcion"];
            $usuario = $_POST["usuario"];
            $pincho = $_POST["pincho"];
            $resegnaController->altaResegna($puntuacion, $descripcion, $usuario, $pincho);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'bajaResegna':
        if (isset($_SESSION["user"])) {
            $id = $array_ruta[1];
            $resegnaController->bajaResegna($id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'fichaResegna':
        if (isset($_SESSION["user"])) {
            $puntuacion = $_GET["puntuacion"];
            $descripcion = $_GET["descripcion"];
            $usuario = $_GET["usuario"];
            $pincho = $_GET["pincho"];
            $id = $_GET["id"];
            $resegnaController->verFichaResegna($puntuacion, $descripcion, $usuario, $pincho, $id);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'modificaResegna':
        if (isset($_SESSION["user"])) {
            $puntuacion = $_GET["puntuacion"];
            $descripcion = $_GET["descripcion"];
            $usuario = $_GET["usuario"];
            $pincho = $_GET["pincho"];
            $id = $_GET["id_resegna"];
            $resegnaController->modificaResegna($id, $puntuacion, $descripcion, $usuario, $pincho);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'obtieneResegnas':
        if (isset($_SESSION["user"])) {
            $limite = $array_ruta[1];
            $numero = $array_ruta[2];
            $resegnaController->obtieneResegnas($limite, $numero);
        } else {
            $loginController->muestraLogin();
        }
        break;
    case 'listadoBares':
        $barController->listadoBares();
        break;
    case 'listadoPinchos':
        $pinchoController->listadoPinchos();
        break;
    case 'tarjetaBar':
        $id = $array_ruta[1];
        $barController->tarjetaBar($id);
        break;
    case 'tarjetaPincho':
        $id = $array_ruta[1];
        $pinchoController->tarjetaPincho($id);
        break;
    case 'pinchosFav':
        $idPincho = $array_ruta[1];
        $usuario = $array_ruta[2];
        $fav = $array_ruta[3];
        $pinchoController->setPinchoFavorito($idPincho, $usuario, $fav);
        break;
    case 'eliminarUsuario':
        $loginController->borrarUsuario();
        break;
    case 'likesResegnas':
        $idResegna = $array_ruta[1];
        $pinchoController->likesResegnas($idResegna);
        break;
    default:
        header("Location: " . $home . "home");
        break;
}
