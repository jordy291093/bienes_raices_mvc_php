<!--     Pagina principal   -->

<?php 
    // Sesion
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if (!isset($inicio)) {
        $inicio = false;
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../build/css/app.css">
        <title>Bienes Raíces</title>
    </head>
    <body>
        
        <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="/">
                        <img src="/build/img/logo.svg" alt="Logotipo">
                    </a>

                    <div class="mobile-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    
                    <div class="derecha">
                        <nav class="navegacion">
                            <a href="/nosotros">Nosotros</a>
                            <a href="/propiedades">Anuncios</a>
                            <a href="/blog">Blog</a>
                            <a href="/contacto">Contacto</a>
                            <?php if($auth): ?>
                                <a href="/logout">Cerrar Sesión</a>
                            <?php else: ?>
                                <a href="/login">Iniciar Sesión</a>
                            <?php endif; ?>
                            <i class="fa-solid fa-lightbulb darkMode"></i>
                        </nav>
                    </div>
                    
                </div> <!--.barra-->
                <?php if($inicio) { ?>
                    <h1>Venta de casas y Departamentos <br> Exclusivos de Lujos</h1>
                <?php } ?>
            </div>
        </header>

        <?php echo $contenido; ?>

        <footer class="footer seccion">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>

            <p class="copyright">Todos los derechos Reservados <?php echo date('Y') ?> &copy; [Proyecto JM]</p>
        </footer>

        <script src="../build/js/bundle.min.js"></script>
    </body>
</html>