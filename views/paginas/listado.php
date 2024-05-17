<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) { ?>

        <div class="anuncio">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
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

                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div> <!--.contenido-anuncio-->
        </div> <!--.anuncio-->
    <?php } ?>
</div> <!--.contenedor-anuncios-->