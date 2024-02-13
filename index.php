<?php
    require 'includes/funciones.php';
    incluirTemplate('header', true);

?>

    <main class="contenedor seccion">
        <h1>Cuida de tus Plantas de Manera Inteligente</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                    Nuestros sistemas de monitoreo son totalmente seguros para cualquier jardín, además de proporcionar
                    seguridad sobre los datos generados por el sistema sobre su jardín.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>
                    Nuestros sistemas de monitoreo tienen el precio más accesible del mercado, proporcionando un
                    servicio excepcional de monitoreo de su jardín desde la palma de su mano, otorgándole tranquilidad,
                    permitiéndole estar seguro sobre la salud de su jardín.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>
                    Nuestros sistemas de monitoreo siempre están trabajando para usted, informándolo en el momento
                    indicado en el que se necesite realizar los cuidados necesarios de su jardín para así mantener la
                    salud de su jardín en óptimas condiciones.
                </p>
            </div>
        </div> <!--iconos-nosotros-->

        <section class="contenedor seccion">
            <h2>Sistemas de Monitoreo</h2>

            <div class="contenedor-sistemas">
                <div class="sistema">
                    <picture>
                        <source srcset="build/img/poseidon3.webp" type="image/webp">
                        <source srcset="bulid/img/poseidon3.jpg" type="image/jpeg">

                        <img loading="lazy" src="build/img/poseidon3.jpg" alt="anuncio">
                    </picture>

                    <div class="contenido-sistema">

                        <h3>Poseidon Génesis</h3>
                        <p>
                            Sistema compacto de monitoreo de temperatura y humedad, lanza notificaciones vía email para
                            mantenernos informados y cuando es necesario proporcionar los cuidados necesarios a su
                            jardín.
                        </p>
                        <p class="precio">$600</p>

                        <a href="productos.html" class="boton btn-verde">Ver Producto</a>
                    </div> <!--contenido-sistema-->

                </div> <!--sistema-->

                <div class="sistema">
                    <picture>
                        <source srcset="build/img/poseidon2.webp" type="image/webp">
                        <source srcset="bulid/img/poseidon2.jpg" type="image/jpeg">

                        <img loading="lazy" src="build/img/poseidon2.jpg" alt="anuncio">
                    </picture>

                    <div class="contenido-sistema">

                        <h3>Poseidon Génesis II</h3>
                        <p>
                            Sistema de monitoreo de temperatura y humedad, lanza notificaciones vía email para
                            mantenernos informados y realiza el riego de nuestro jardín de manera automatizada.
                        </p>
                        <p class="precio"></p>

                        <a href="productos.html" class="boton btn-amarillo">Proximamente</a>
                    </div> <!--contenido-sistema-->

                </div> <!--sistema-->

                <div class="sistema">
                    <picture>
                        <source srcset="build/img/poseidon1.webp" type="image/webp">
                        <source srcset="bulid/img/poseidon1.jpg" type="image/jpeg">

                        <img loading="lazy" src="build/img/poseidon1.jpg" alt="anuncio">
                    </picture>

                    <div class="contenido-sistema">

                        <h3>Poseidon Éxodo</h3>
                        <p>
                            Sistema robusto de monitoreo sobre nuestros jardines, realiza todos los cuidados de nuestro
                            jardín de manera automatizada, ¡sin necesidad de preocuparse!
                        </p>
                        <p class="precio"></p>

                        <a href="productos.html" class="boton btn-amarillo">Proximamente</a>
                    </div> <!--contenido-sistema-->

                </div> <!--sistema-->
            </div>
        </section>
    </main>

<?php 
    incluirTemplate('footer');
?>