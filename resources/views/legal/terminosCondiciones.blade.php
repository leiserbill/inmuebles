<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-head-publico></x-head-publico>

<body>

    <main class="w-4/6 mx-auto py-10 ">
        <div class="space-y-5">
            <h1 class="text-3xl">Condiciones de uso y políticas de publicación</h1>
            <p>El site Inmuebles Reyes es propiedad de (Nombre de la empresa) con dirección en Los Reyes de Juárez
                Puebla, RFC ---------- , </p>

            <h2 class="text-2xl">Políticas de publicación</h2>

            <p>
                Todos los anuncios publicados en Inmuebles Reyes son validados de forma manual por nuestro equipo. Si
                algún anuncio no cumple nuestras políticas de publicación será rechazado. Inmuebles Reyes se reserva el
                derecho de decidir si un anuncio cumple con nuestras reglas y políticas de empresa
            </p>
            <h3 class="text-xl">Inmuebles Reyes NO VALIDARA</h3>
            <ul class="space-y-2 pl-10">
                <li>Anuncios duplicados (son considerados spam)</li>

                <li>Anuncios iguales publicados en diferentes regiones o ciudades</li>

                <li>Anuncios con precios en moneda distinta a la de curso legal</li>

                <li>Anuncios que ofrezcan réplicas o falsificaciones de productos y marcas registradas</li>

                <li>Anuncios en otros idiomas</li>

                <li>Anuncios publicados en categorías que no estén relacionadas con el producto ofrecido</li>

                <li>Por el momento nuestra pagina solo acepta publicaciones en la Ciudad de Puebla y los siguientes
                    Municipios</li>

            </ul>

            <h2 class="text-2xl">Condiciones de Uso</h2>

            <ul class="space-y-2">
                <li> Todos los usuarios del sitio pueden utilizar el servicio de búsqueda, de forma gratuita y anónima.
                </li>

                <li> Nuestro sitio está disponible las 24 horas del día, siete días a la semana en ausencia de un caso
                    de fuerza mayor o de un acontecimiento que está fuera del control de nuestros sitios y con sujeción
                    a las averías y el mantenimiento necesarios para el buen funcionamiento del sitio y de los equipos.
                    El sitio puede no estar disponible durante el mantenimiento sin necesidad de previo aviso.</li>

                <li> La asistencia técnica en el caso de funcionamiento defectuoso de nuestro sitio se podría
                    proporcionar a los usuarios bajo el rubro «contacto». Dicha asistencia no cubrirá los problemas
                    relacionados con los equipos terminales de telecomunicaciones o la configuración de su software.
                </li>

                <li> Inmuebles Reyes no se hace responsable por ninguna de las publicaciones de la web Inmuebles Reyes
                    México. Los anunciantes son los únicos responsables por el contenido de sus anuncios.</li>

                <li> En ocasiones Inmuebles Reyes puede facilitar datos de contacto que se muestran de forma pública en
                    webs externas a Inmuebles Reyes.</li>

                <li> Tampoco nos responsabilizamos por los mensajes entre usuarios, correos electrónicos enviados fuera
                    del sistema de correo electrónico de Inmuebles Reyes, comentarios, imágenes, videos u otra
                    información que se encuentre a disposición en nuestro sitio web.</li>

                <li> Inmuebles Reyes nunca interviene en ninguna transacción de compra-venta o en la comunicación entre
                    los usuarios. Nuestra empresa solo actúa como plataforma para que los anunciantes publiquen sus
                    productos o servicios.</li>

                <li> Todas las imágenes de los anuncios publicados están protegidas con marcas de agua, para prevenir
                    que sean usadas para otros propósitos sin el previo consentimiento de los anunciantes.</li>

                <li> Inmuebles Reyes cooperará con las autoridades cada vez que sea necesario para cualquier caso en que
                    los anuncios violen las leyes.</li>

                <li> Con el fin de prevenir abusos en Inmuebles Reyes, nuestro sitio pone a disposición de los usuarios
                    nuestro sistema de denuncias. De esta manera nuestro equipo será informado de cualquier problema o
                    contenido ofensivo referente a un anuncio y poder tomar las medidas respectivas.</li>

                <li> Inmuebles Reyes agrupa contenido subido directamente por los propios usuarios del sitio, así como
                    anuncios indexados de webs de acceso público. Inmuebles Reyes no se hace responsable de ningún otro
                    contenido que no sea generado directamente por el equipo Inmuebles Reyes.</li>

            </ul>
        <h2 class="text-2xl">Política de protección de datos y Cookies </h2>

        <p>
            En este sitio usamos y recopilamos cookies para un correcto funcionamiento del sitio, proporcionar un acceso seguro y ofrecer contenido adaptado a tus intereses. Al continuar navegando en el sitio, y aceptar nuestros términos y condiciones, nos das permiso para su utilización. Para más información, ver nuestra <x-link target="_blank" rel="noopener noreferrer" class="text-indigo-800" :href="route('politicas')"> Politica de Privacidad  </x-link> .
        </p>

        <h2 class="text-2xl">Cambios en la Política de Privacidad</h2>

        <p>
            De vez en cuando, podremos modificar o adaptar nuestra Política de Privacidad y Tratamiento de datos de Carácter Personal. Te recomendamos que la visites cada vez que navegues por el Sitio Web, con el fin de estar siempre informado con carácter previo a cualquier dato que puedas facilitarnos.
        </p>
        </div>
    </main >

    @livewireScripts
    @stack('scripts')
</body>

</html>