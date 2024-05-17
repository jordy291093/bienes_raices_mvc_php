<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login(Router $router) {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                // Verificar si el usuario exista
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    // Verificar si el usuario existe ( mesnaje de error)
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el password
                    $autenticado = $auth->existePassword($resultado);

                    if ($autenticado){
                        // Autenticar el usuario
                        $auth->iniciarSesion();
                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('/auth/login', [
            'errores'=> $errores
        ]);
    }

    public static function logout() {
        
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}