<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">

        <input type="submit" value="Iniciar Sesión" class=" boton-azul-block">
    </form>

</main>