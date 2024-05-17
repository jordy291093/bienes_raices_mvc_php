<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if ($mensaje) { ?>
        <p class='alerta exito'> <?php echo $mensaje ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Infromación Personal</legend>
            
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" >

            <label for="mensjae">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
        </fieldset>

        <fieldset>
            <legend>Infromación sobre propiedad</legend>
            
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[opciones]" >
                <option value="" disabled selected >-- Seleccione --</option>
                <option value="Comprar">Comprar</option>
                <option value="Vender">Vender</option>
            </select>

            <label for="presupuesto">Cantidad</label>
            <input type="number" id="presupuesto" name="contacto[presupuesto]" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            
            <p>Comó desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="Telefono" id="contactar-telefono" >

                <label for="contactar-email">E-mail</label>
                <input name="contacto[contacto]" type="radio" value="Email" id="contactar-email" >
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>