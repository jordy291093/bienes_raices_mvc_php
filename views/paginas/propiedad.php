<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad">

    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <i class="fa-solid fa-toilet"></i>
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <i class="fa-solid fa-car-side"></i>
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <i class="fa-solid fa-couch"></i>
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>

        <p>
            <?php echo $propiedad->descripcion; ?>
        </p>
    </div>
</main>