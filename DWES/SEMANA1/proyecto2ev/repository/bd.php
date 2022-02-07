<?php
class BD
{
    private $db;
    public function __construct()
    {
        $this->db = Conexion::getConexion();
    }

    /**
     * getConexion
     *
     * @return void
     */
    function getConexion()
    {
        return $this->db;
    }

    /**
     * compruebaLogin
     *
     * @param  mixed $user
     * @param  mixed $password
     * @return void
     */
    function compruebaLogin($user, $password)
    {
        try {
            $sql = "SELECT * FROM usuarios where email='$user'";
            $resultado = $this->db->query($sql);
            foreach ($resultado as $dato) {
                if ($dato["email"] == $user && $dato["password"] == sha1($password)) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * altaBar
     *
     * @param  mixed $nombre
     * @param  mixed $puntuacion
     * @param  mixed $latitud
     * @param  mixed $longitud
     * @return void
     */
    function altaBar($nombre, $latitud = 0, $longitud = 0)
    {
        try {
            $sql = "INSERT INTO bares (nombre,latitud,longitud) VALUES ('$nombre',$latitud,$longitud)";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * altaResegna
     *
     * @param  mixed $puntuacion
     * @param  mixed $descripcion
     * @param  mixed $usuario
     * @param  mixed $pincho
     * @return void
     */
    function altaResegna($puntuacion, $descripcion, $usuario, $pincho)
    {
        try {
            $sql = "INSERT INTO reseñas (puntuacion,descripcion,usuario,pincho) VALUES ($puntuacion, '$descripcion',$usuario,$pincho)";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * bajaResegna
     *
     * @param  mixed $id
     * @return void
     */
    function bajaResegna($id)
    {
        try {
            $sql = "DELETE FROM reseñas WHERE id=" . $id;
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * modificaResegna
     *
     * @param  mixed $id
     * @param  mixed $puntuacion
     * @param  mixed $descripcion
     * @param  mixed $usuario
     * @param  mixed $pincho
     * @return void
     */
    function modificaResegna($id, $puntuacion, $descripcion, $usuario, $pincho)
    {
        try {
            $sql = "UPDATE reseñas SET puntuacion=$puntuacion,descripcion='$descripcion',usuario=$usuario,pincho=$pincho WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * bajaBar
     *
     * @param  mixed $id
     * @return void
     */
    function bajaBar($id)
    {
        try {
            $sql = "DELETE FROM bares WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * modificaBar
     *
     * @param  mixed $id
     * @param  mixed $nombre
     * @param  mixed $puntuacion
     * @param  mixed $latitud
     * @param  mixed $longitud
     * @return void
     */
    function modificaBar($id, $nombre, $puntuacion, $latitud, $longitud)
    {
        try {
            $sql = "UPDATE bares SET nombre='$nombre',puntuacion=$puntuacion,latitud=$latitud,longitud=$longitud WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneResegnas
     *
     * @param  mixed $limite
     * @param  mixed $numero
     * @return void
     */
    function obtieneResegnas($limite, $numero)
    {
        try {
            $sql = "SELECT * FROM reseñas LIMIT $limite,$numero";
            $resultado = $this->db->query($sql);
            $reseñas = array();
            foreach ($resultado as $reseña) {
                array_push($reseñas, $reseña);
            }
            return $reseñas;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneResegna
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneResegna($id)
    {
        try {
            $sql = "SELECT * FROM reseñas WHERE id=$id";
            $resultado = $this->db->query($sql);
            $reseñas = array();
            foreach ($resultado as $reseña) {
                array_push($reseñas, $reseña);
            }
            return $reseñas;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * altaPincho
     *
     * @param  mixed $nombre
     * @param  mixed $bar
     * @return void
     */
    function altaPincho($nombre, $bar)
    {
        try {
            $sql = "INSERT INTO pinchos (nombre,bar) VALUES ('$nombre',$bar)";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * bajaPincho
     *
     * @param  mixed $id
     * @return void
     */
    function bajaPincho($id)
    {
        try {
            $sql = "DELETE FROM pinchos WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * modificaPincho
     *
     * @param  mixed $id
     * @param  mixed $nombre
     * @param  mixed $bar
     * @return void
     */
    function modificaPincho($id, $nombre, $bar)
    {
        try {
            $sql = "UPDATE pinchos SET nombre='$nombre',bar=$bar WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * modificaUsuario
     *
     * @param  mixed $id
     * @param  mixed $email
     * @param  mixed $password
     * @param  mixed $admin
     * @return void
     */
    function modificaUsuario($id, $email, $password, $admin)
    {
        try {
            $contrasegna = sha1($password);
            $sql = "UPDATE usuarios SET email='$email',password='$contrasegna',admin=$admin WHERE id=$id";
            $this->db->query($sql);
            echo $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneBares
     *
     * @param  mixed $limite
     * @param  mixed $numero
     * @return void
     */
    function obtieneBares($limite, $numero)
    {
        try {
            $sql = "SELECT * FROM bares LIMIT $limite,$numero";
            $resultado = $this->db->query($sql);
            $bares = array();
            foreach ($resultado as $bar) {
                array_push($bares, $bar);
            }
            return $bares;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * obtieneBar
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneBar($id)
    {
        try {
            $sql = "SELECT * FROM bares WHERE id=$id";
            $resultado = $this->db->query($sql);
            $bares = array();
            foreach ($resultado as $bar) {
                array_push($bares, $bar);
            }
            return $bares;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtienePinchos
     *
     * @param  mixed $limite
     * @param  mixed $numero
     * @return void
     */
    function obtienePinchos($limite, $numero)
    {
        try {
            $sql = "SELECT * FROM pinchos LIMIT $limite,$numero";
            $resultado = $this->db->query($sql);
            $pinchos = array();
            foreach ($resultado as $pincho) {
                array_push($pinchos, $pincho);
            }
            return $pinchos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneTodosPinchos
     *
     * @return void
     */
    function obtieneTodosPinchos()
    {
        try {
            $sql = "SELECT * FROM pinchos";
            $resultado = $this->db->query($sql);
            $pinchos = array();
            foreach ($resultado as $pincho) {
                array_push($pinchos, $pincho);
            }
            return $pinchos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneTodosBares
     *
     * @return void
     */
    function obtieneTodosBares()
    {
        try {
            $sql = "SELECT * FROM bares";
            $resultado = $this->db->query($sql);
            $bares = array();
            foreach ($resultado as $bar) {
                array_push($bares, $bar);
            }
            return $bares;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * guardaImagenesBares
     *
     * @param  mixed $idBar
     * @param  mixed $fotos
     * @return void
     */
    function guardaImagenesBares($idBar, $fotos)
    {
        try {
            $this->db->beginTransaction();
            $ruta = "img_bares/" . $idBar . "/";

            for ($i = 0; $i < count($fotos); $i++) {
                if ($fotos[$i] != "" && $fotos[$i] != null) {
                    $rutaCompleta = $ruta . "" . $fotos[$i];
                    $sql = "INSERT INTO imagenes_bares (imagen, bar) VALUES ('$rutaCompleta', '$idBar')";
                    $resultado = $this->db->query($sql);
                    if (!$resultado) {
                        $this->db->rollBack();
                        return false;
                    }
                }
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * obtieneImagenesPincho
     *
     * @param  mixed $idPincho
     * @return void
     */
    function obtieneImagenesPincho($idPincho)
    {
        try {
            $sql = "SELECT imagen from imagenes_pinchos where pincho=" . $idPincho;
            $imagenes = array();
            $resultado = $this->db->query($sql);
            foreach ($resultado as $imagen) {
                $imagenes[] = $imagen;
            }
            return $imagenes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    function obtieneImagenesBares($idBar)
    {
        try {
            $sql = "SELECT imagen from imagenes_bares where bar=" . $idBar;
            $imagenes = array();
            $resultado = $this->db->query($sql);
            foreach ($resultado as $imagen) {
                $imagenes[] = $imagen;
            }
            return $imagenes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * guardaImagenesPinchos
     *
     * @param  mixed $idPincho
     * @param  mixed $fotos
     * @return void
     */
    function guardaImagenesPinchos($idPincho, $fotos)
    {
        try {
            $this->db->beginTransaction();
            $ruta = "img_pinchos/" . $idPincho . "/";

            for ($i = 0; $i < count($fotos); $i++) {
                if ($fotos[$i] != "" && $fotos[$i] != null) {
                    $rutaCompleta = $ruta . "" . $fotos[$i];
                    $sql = "INSERT INTO imagenes_pinchos (imagen, pincho) VALUES ('$rutaCompleta', '$idPincho')";
                    $resultado = $this->db->query($sql);
                    if (!$resultado) {
                        $this->db->rollBack();
                        return false;
                    }
                }
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * obtieneNombreBar
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneNombreBar($id)
    {
        try {
            $sql = "SELECT nombre FROM bares where id=" . $id;
            $resultado = $this->db->query($sql);
            foreach ($resultado as $nombre) {
                return $nombre;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneIdBar
     *
     * @param  mixed $nombre
     * @return void
     */
    function obtieneIdBar($nombre)
    {
        try {
            $sql = "SELECT id FROM bares where nombre=" . "'$nombre'";
            $resultado = $this->db->query($sql);
            foreach ($resultado as $id) {
                return $id[0];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneIdPincho
     *
     * @param  mixed $nombre
     * @return void
     */
    function obtieneIdPincho($nombre)
    {
        try {
            $sql = "SELECT id FROM pinchos where nombre=" . "'$nombre'";
            $resultado = $this->db->query($sql);
            foreach ($resultado as $id) {
                return $id[0];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneNombrePincho
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneNombrePincho($id)
    {
        try {
            $sql = "SELECT nombre FROM pinchos where id=" . $id;
            $resultado = $this->db->query($sql);
            foreach ($resultado as $nombre) {
                return $nombre;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * obtieneUsuarios
     *
     * @param  mixed $limite
     * @param  mixed $numero
     * @return void
     */
    function obtieneUsuarios($limite, $numero)
    {
        try {
            $sql = "SELECT * FROM usuarios LIMIT $limite,$numero";
            $resultado = $this->db->query($sql);
            $usuarios = array();
            foreach ($resultado as $usuario) {
                array_push($usuarios, $usuario);
            }
            return $usuarios;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneTodosUsuarios
     *
     * @return void
     */
    function obtieneTodosUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuarios";
            $resultado = $this->db->query($sql);
            $usuarios = array();
            foreach ($resultado as $usuario) {
                array_push($usuarios, $usuario);
            }
            return $usuarios;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * obtieneCorreoUsuario
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneCorreoUsuario($id)
    {
        try {
            $sql = "SELECT email FROM usuarios where id=" . $id;
            $resultado = $this->db->query($sql);
            foreach ($resultado as $email) {
                return $email;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * obtieneIdUsuario
     *
     * @param  mixed $email
     * @return void
     */
    function obtieneIdUsuario($email)
    {
        try {
            $sql = "SELECT id FROM usuarios where email=" . "'$email'";
            $resultado = $this->db->query($sql);
            foreach ($resultado as $id) {
                return $id;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }





    /**
     * obtieneUsuario
     *
     * @param  mixed $id
     * @return void
     */
    function obtieneUsuario($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id=$id";
            $resultado = $this->db->query($sql);
            $usuarios = array();
            foreach ($resultado as $usuario) {
                array_push($usuarios, $usuario);
            }
            return $usuarios;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * obtienePincho
     *
     * @param  mixed $id
     * @return void
     */
    function obtienePincho($id)
    {
        try {
            $sql = "SELECT * FROM pinchos WHERE id=$id";
            $resultado = $this->db->query($sql);
            $pinchos = array();
            foreach ($resultado as $pincho) {
                array_push($pinchos, $pincho);
            }
            return $pinchos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * altaUsuario
     *
     * @param  mixed $email
     * @param  mixed $password
     * @param  mixed $admin
     * @return void
     */
    function altaUsuario($email, $password)
    {
        try {
            $contrasegna = sha1($password);
            $sql = "INSERT INTO usuarios (email,password,admin) values ('$email','$contrasegna','false')";
            $this->db->query($sql);
            echo "<br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * bajaUsuario
     *
     * @param  mixed $id
     * @return void
     */
    function bajaUsuario($id)
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id=$id";
            $this->db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
