<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="New Frisa Corporate website">
    <title>Error form - Frisa Materials</title>
    <link rel="stylesheet" href="/es/css/styles.css">
  </head>
  
  <body>
    <header class="mainHeader">
      <a class="logo logo__mainHeader" href="/es/">
        <img src="/img/frisa-logo.jpg" alt="Frisa logo">
      </a>
      
      <a class="logo logo__mainHeader2" href="/es/">
        <img src="/img/frisa-logo-2.png" alt="Frisa logo">
      </a>  
      
      <nav class="mainNav">
        <ul class="mainNav-menu">
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/products/">Products</a>
            <ul class="mainNav-dropdown">
              <li><a href="/es/products/rolled-rings.html">Rolled Rings</a></li>
              <li><a href="/es/products/contoured-rings.html">Contoured Rings</a></li>
              <li><a href="/es/products/bars.html">Bars</a></li>
              <li><a href="/es/products/hollows.html">Hollows</a></li>
              <li><a href="/es/products/shafts.html">Shafts</a></li>
              <li><a href="/es/products/blocks.html">Blocks</a></li>
              <li><a href="/es/products/discs.html">Discs</a></li>
              <li><a href="/es/products/pot-die-forgings.html">Pot Die Forgings</a></li>
            </ul>
          </li>
          
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/industries/">Industries</a>
            <ul class="mainNav-dropdown">
              <li><a href="/es/industries/aerospace.html">Aerospace</a></li>
              <li><a href="/es/industries/construction-and-mining.html">Construction and Mining</a></li>
              <li><a href="/es/industries/industrial-machinery.html">Industrial Machinery</a></li>
              <li><a href="/es/industries/oil-and-gas.html">Oil and Gas</a></li>
              <li><a href="/es/industries/power-generation.html">Power Generation</a></li>
              <li><a href="/es/industries/wind-power.html">Wind Power</a></li>
            </ul>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/materials.html">Materials</a>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/services/heat-treatment.html">Services</a>
            <ul class="mainNav-dropdown">
              <li><a href="/es/services/heat-treatment.html">Heat Treatment</a></li>
              <li><a href="/es/services/machining.html">Machining</a></li>
              <li><a href="/es/services/testing.html">Testing</a></li>
              <li><a href="/es/services/product-development.html">Product Development</a></li>
              <li><a href="/es/services/logistics.html">Logistics</a></li>
            </ul>
          </li>        
          
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/quality.html">Quality</a>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/about/overview.html">About</a>
            <ul class="mainNav-dropdown">
              <li><a href="/es/about/overview.html">Overview</a></li>
              <li><a href="/es/about/facilities.html">Facilities</a></li>
              <li><a href="/es/about/fundacion-frisa.html">Social Responsability</a></li>
              <li><a href="/es/about/downloads.html">Downloads</a></li>
            </ul>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/es/contact/general-inquiry.html">Contact us</a>
            <ul class="mainNav-dropdown">
              <li><a href="/es/contact/general-inquiry.html">General Inquiry</a></li>
              <li><a href="/es/contact/request-quote.html">Request a quote</a></li>
              <li><a href="/es/contact/suppliers-relations.html">Suppliers Relations</a></li>
              <li><a href="/es/contact/careers.html">Careers</a></li>
            </ul>
          </li>
        </ul>

        <div class="mainNav-actions">
          <a class="logo logo__efrisa" href="http://www.efrisa.com" target="_blank">
            <img src="/img/efrisa-logo.png" alt="eFrisa logo">
          </a>
          <a class="btn-lang" href="#">English</a>
        </div>
      </nav>
      <button id="mobileNav-trigger" class="mobileNav-trigger">
        <img src="/img/mobileNav-trigger.png" alt="">
      </button>
    </header>

    <section class="form-confirmation">
      <h3 class="title title__red title__big">
        Ups! <br>
        We failed to send your message. Please try later again.
      </h3>


      <?php
        // el valor default que toma si no hay query param, 
        // ej si llegan direto a esta pagina.
        $redirect_to = "index.html"; 

        if (isset($_GET["back"])) {
          $redirect_to = "contact/".$_GET["back"].".html";
        }
      ?>
      <a class="btn btn__large btn__red-onWhite" href="/es/<?php echo $redirect_to; ?>">Back</a>
    </section>

    <section class="home-actions">
      <a class="home-actions__item home-actions__item--quote" href="http://www.frisaexpress.com" target="_blank">
        <h4>Need quick forgings?</h4>
        <p>
          Frisa Express offers fast turnaround with quick delivery shedules on selected products. We ship in as little as 5 days.
        </p>
        <span class="btn btn__small btn__white">Start now</span>
      </a>
      <a class="home-actions__item home-actions__item--careers" href="/es/contact/careers.html">
        <h4>Frisa Careers</h4>
        <p>
          If you are interested in being part of the forging evolution, please send us your resume.
        </p>
        <span class="btn btn__small btn__white">Send</span>
      </a>
    </section>

    <footer>
      <div class="container">      
        <a href="/es/" class="logo logo__footer">
          <img src="/img/frisa-logo-2.png" alt="">
        </a>
        <div class="social">
          <p>Síguenos</p>
          <a href="https://www.facebook.com/frisa.forjados" class="social-icon" target="_blank">
            <img src="/img/facebook.png">
          </a>
          <a href="https://www.linkedin.com/company/frisa-forjados" class="social-icon" target="_blank">
            <img src="/img/linkedin.png">
          </a>
        </div>

        <div class="contactInfo">
          <p>Contacto</p>
          <span>México Sin costo: 01 800 253 7472</span>
          <span>USA sin costo: 1 888 882 0959</span>
          <span>Internacional: +52 (81) 8153 0300</span>
        </div>

        <div class="footerLinks">
          <a href="http://www.efrisa.com" target="_blank">eFrisa</a>
          <a href="http://proveedores.frisa.com/proveedores/Home/wfAnonymousBox.aspx" target="_blank">Buzón de denuncia Frisa</a>
        </div>
      </div>

      <div class="legals">
        <p class="legals-item">FRISA TODOS LOS DERECHOS RESERVADOS 2016</p>
        <span class="separator"> </span>
        <p class="legals-item">Santa Catarina, Nuevo León. México</p>
        <span class="separator"> </span>
        <a class="legals-item" href="/es/privacy-policy.html" target="_blank">Políticas de privacidad</a>
      </div>
    </footer>

    <nav class="mobileNav">
      <ul class="mobileNav-menu">
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Productos</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Atras</a></li>
            <li><a class="mobileNav-link" href="/es/productos/rolled-rings.html">Anillos Rolados</a></li>
            <li><a class="mobileNav-link" href="/es/productos/contoured-rings.html">Anillos con Forma</a></li>
            <li><a class="mobileNav-link" href="/es/productos/bars.html">Barras</a></li>
            <li><a class="mobileNav-link" href="/es/productos/hollows.html">Barras Huecas</a></li>
            <li><a class="mobileNav-link" href="/es/productos/shafts.html">Rodillos</a></li>
            <li><a class="mobileNav-link" href="/es/productos/blocks.html">Bloques y Soleras</a></li>
            <li><a class="mobileNav-link" href="/es/productos/discs.html">Discos</a></li>
            <li><a class="mobileNav-link" href="/es/productos/pot-die-forgings.html">Forja semi cerrada</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Industrias</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Atras</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/aeroespacial.html">Aeroespacial</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/construccion-mineria.html">Construcción y minería</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/maquinaria-general.html">Maquinaria en general</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/petroleo-gas.html">Petróleo y Gas</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/generacion-energia.html">Generación de energía</a></li>
            <li><a class="mobileNav-link" href="/es/industrias/eolico.html">Eólico</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="/es/materiales.html">Materiales</a>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Servicios</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Atras</a></li>
            <li><a class="mobileNav-link" href="/es/servicios/tratamiento-termico.html">Tratamiento Térmico</a></li>
            <li><a class="mobileNav-link" href="/es/servicios/maquinado.html">Maquinado</a></li>
            <li><a class="mobileNav-link" href="/es/servicios/pruebas-laboratorio.html">Pruebas de Laboratorio</a></li>
            <li><a class="mobileNav-link" href="/es/servicios/desarrollo-producto.html">Desarrollo de Producto</a></li>
            <li><a class="mobileNav-link" href="/es/servicios/logistica.html">Logistica</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="/es/calidad.html">Calidad</a>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Acerca de</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Atras</a></li>
            <li><a class="mobileNav-link" href="/es/acerca-de/acerca-de-frisa.html">Acerca de Frisa</a></li>
            <li><a class="mobileNav-link" href="/es/acerca-de/instalaciones.html">Instalaciones</a></li>
            <li><a class="mobileNav-link" href="/es/acerca-de/fundacion-frisa.html">Responsabilidad social</a></li>
            <li><a class="mobileNav-link" href="/es/acerca-de/descargas.html">Descargas</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Contacto</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Atras</a></li>
            <li><a class="mobileNav-link" href="/es/contacto/contacto.html">Información de contacto</a></li>
            <li><a class="mobileNav-link" href="/es/contacto/solicitar-cotizacion.html">Solicitar una cotización</a></li>
            <li><a class="mobileNav-link" href="/es/contacto/relacion-proveedores.html">Relación con proveedores</a></li>
            <li><a class="mobileNav-link" href="/es/contacto/trabaja-con-nosotros.html">Trabaja con nosotros</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">English</a>
        </li>
      </ul>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/scripts/unslider.min.js"></script>
    <script src="/scripts/main.js"></script>
  </body>
</html>