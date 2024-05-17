<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    
    public static function index(Router $router) {

        $inicio = true;
        $propiedades = Propiedad::get(3);

        $router->render('paginas/index', [
            'propiedades'=>$propiedades,
            'inicio'=>$inicio
        ]);
    }

    public static function nosotros(Router $router) {

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades'=>$propiedades
        ]);
    }

    public static function propiedad(Router $router) {

        $id = validarID('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad'=>$propiedad
        ]);
    }

    public static function blog(Router $router) {

        $router->render('paginas/blog');
    }

    public static function entradaBlog(Router $router) {

        $router->render('paginas/entradaBlog');
    }

    public static function contacto(Router $router) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $mensaje = null;
            $respuestas = $_POST['contacto'];
            
            // Crear una instancia para PHPMailer
            $mail = new PHPMailer();

            // Configurar el SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Tipo de contacto: ' . $respuestas['contacto'] . '</p>';

            // Enviar depende de la seleccion de contacto
            if ($respuestas['contacto'] === 'Telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono:</p>';
                $contenido .= '<p>Contacto: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha citada: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora citada: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por Email:</p>';
                $contenido .= '<p>Correo: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Tipo: ' . $respuestas['opciones'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto sin HTML';

            // Enviar en email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado";
            } else {
                $mensaje = "Mensaje no enviado";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje'=>$mensaje
        ]);
    }
}