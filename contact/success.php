<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="New Frisa Corporate website">
    <title>Success form - Success/title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" type="img/ico" href="/favicon.ico">
  </head>
  
  <body>
    <header class="mainHeader">
      <a class="logo logo__mainHeader" href="/">
        <img src="/img/frisa-logo.jpg" alt="Frisa logo">
      </a>
      
      <a class="logo logo__mainHeader2" href="/">
        <img src="/img/frisa-logo-2.png" alt="Frisa logo">
      </a>  
      
      <nav class="mainNav">
        <ul class="mainNav-menu">
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/products/">Products</a>
            <ul class="mainNav-dropdown">
              <li><a href="/products/rolled-rings.html">Rolled Rings</a></li>
              <li><a href="/products/contoured-rings.html">Contoured Rings</a></li>
              <li><a href="/products/bars.html">Bars</a></li>
              <li><a href="/products/hollows.html">Hollows</a></li>
              <li><a href="/products/shafts.html">Shafts</a></li>
              <li><a href="/products/blocks.html">Blocks</a></li>
              <li><a href="/products/discs.html">Discs</a></li>
              <li><a href="/products/pot-die-forgings.html">Pot Die Forgings</a></li>
            </ul>
          </li>
          
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/industries/">Industries</a>
            <ul class="mainNav-dropdown">
              <li><a href="/industries/aerospace.html">Aerospace</a></li>
              <li><a href="/industries/construction-and-mining.html">Construction and Mining</a></li>
              <li><a href="/industries/industrial-machinery.html">Industrial Machinery</a></li>
              <li><a href="/industries/oil-and-gas.html">Oil and Gas</a></li>
              <li><a href="/industries/power-generation.html">Power Generation</a></li>
              <li><a href="/industries/wind-power.html">Wind Power</a></li>
            </ul>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/materials.html">Materials</a>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/services/heat-treatment.html">Services</a>
            <ul class="mainNav-dropdown">
              <li><a href="/services/heat-treatment.html">Heat Treatment</a></li>
              <li><a href="/services/machining.html">Machining</a></li>
              <li><a href="/services/testing.html">Testing</a></li>
              <li><a href="/services/product-development.html">Product Development</a></li>
              <li><a href="/services/logistics.html">Logistics</a></li>
            </ul>
          </li>        
          
          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/quality.html">Quality</a>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/about/overview.html">About</a>
            <ul class="mainNav-dropdown">
              <li><a href="/about/overview.html">Overview</a></li>
              <li><a href="/about/facilities.html">Facilities</a></li>
              <li><a href="/about/fundacion-frisa.html">Social Responsability</a></li>
              <li><a href="/about/downloads.html">Downloads</a></li>
            </ul>
          </li>

          <li class="mainNav-menuItem">
            <a class="mainNav-link" href="/contact/general-inquiry.html">Contact us</a>
            <ul class="mainNav-dropdown">
              <li><a href="/contact/general-inquiry.html">General Inquiry</a></li>
              <li><a href="/contact/request-quote.html">Request a quote</a></li>
              <li><a href="/contact/suppliers-relations.html">Suppliers Relations</a></li>
              <li><a href="/contact/careers.html">Careers</a></li>
            </ul>
          </li>
        </ul>

        <div class="mainNav-actions">
          <a class="logo logo__efrisa" href="http://www.efrisa.com" target="_blank">
            <img src="/img/efrisa-logo.png" alt="eFrisa logo">
          </a>
          <a class="btn-lang" href="/es/">Español</a>
        </div>
      </nav>
      <button id="mobileNav-trigger" class="mobileNav-trigger">
        <img src="/img/mobileNav-trigger.png" alt="">
      </button>
    </header>

    <section class="form-confirmation">
      <h3 class="title title__red title__big">
        Thank You! <br>
        We have received your information
      </h3>


      <?php
        // el valor default que toma si no hay query param, 
        // ej si llegan direto a esta pagina.
        $redirect_to = "index.html"; 

        if (isset($_GET["back"])) {
          $redirect_to = "contact/".$_GET["back"].".html";
        }
      ?>
      <a class="btn btn__large btn__red-onWhite" href="/<?php echo $redirect_to; ?>">Back</a>
    </section>

    <section class="home-actions">
      <a class="home-actions__item home-actions__item--quote" href="http://www.frisaexpress.com" target="_blank">
        <h4>Need quick forgings?</h4>
        <p>
          Frisa Express offers fast turnaround with quick delivery shedules on selected products. We ship in as little as 5 days.
        </p>
        <span class="btn btn__small btn__white">Start now</span>
      </a>
      <a class="home-actions__item home-actions__item--careers" href="/contact/careers.html">
        <h4>Frisa Careers</h4>
        <p>
          If you are interested in being part of the forging evolution, please send us your resume.
        </p>
        <span class="btn btn__small btn__white">Send</span>
      </a>
    </section>

    <footer>
      <div class="container">      
        <a href="/" class="logo logo__footer">
          <img src="/img/frisa-logo-2.png" alt="">
        </a>
        <div class="social">
          <p>Follow us</p>
          <a href="https://www.facebook.com/frisa.forjados" class="social-icon" target="_blank">
            <img src="/img/facebook.png">
          </a>
          <a href="https://www.linkedin.com/company/frisa-forjados" class="social-icon" target="_blank">
            <img src="/img/linkedin.png">
          </a>
        </div>

        <div class="contactInfo">
          <p>Contact</p>
          <span>México TOLL FREE: 01 800 253 7472</span>
          <span>US TOLL FREE: 1 888 882 0959</span>
          <span>International: +52 (81) 8153 0300</span>
        </div>

        <div class="footerLinks">
          <a href="http://www.efrisa.com" target="_blank">eFrisa</a>
          <a href="http://proveedores.frisa.com/proveedores/Home/wfAnonymousBox.aspx" target="_blank">Buzón de denuncia Frisa</a>
        </div>
      </div>

      <div class="legals">
        <p class="legals-item">FRISA ALL RIGHTS RESERVED 2015</p>
        <span class="separator"> </span>
        <p class="legals-item">Santa Catarina, Nuevo León. México</p>
        <span class="separator"> </span>
        <a class="legals-item" href="/privacy-policy.html" target="_blank">Privacy Policy</a>
      </div>
    </footer>

    <nav class="mobileNav">
      <ul class="mobileNav-menu">
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Products</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Back</a></li>
            <li><a class="mobileNav-link" href="/products/rolled-rings.html">Rolled Rings</a></li>
            <li><a class="mobileNav-link" href="/products/contoured-rings.html">Contoured Rings</a></li>
            <li><a class="mobileNav-link" href="/products/bars.html">Bars</a></li>
            <li><a class="mobileNav-link" href="/products/hollows.html">Hollows</a></li>
            <li><a class="mobileNav-link" href="/products/shafts.html">Shafts</a></li>
            <li><a class="mobileNav-link" href="/products/blocks.html">Blocks</a></li>
            <li><a class="mobileNav-link" href="/products/discs.html">Discs</a></li>
            <li><a class="mobileNav-link" href="/products/pot-die-forgings.html">Pot Die Forgings</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Industries</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Back</a></li>
            <li><a class="mobileNav-link" href="/industries/aerospace.html">Aerospace</a></li>
            <li><a class="mobileNav-link" href="/industries/construction-and-mining.html">Construction and Mining</a></li>
            <li><a class="mobileNav-link" href="/industries/industrial-machinery.html">Industrial Machinery</a></li>
            <li><a class="mobileNav-link" href="/industries/oil-and-gas.html">Oil and Gas</a></li>
            <li><a class="mobileNav-link" href="/industries/power-generation.html">Power Generation</a></li>
            <li><a class="mobileNav-link" href="/industries/wind-power.html">Wind Power</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="/materials.html">Materials</a>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Services</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Back</a></li>
            <li><a class="mobileNav-link" href="/services/heat-treatment.html">Heat Treatment</a></li>
            <li><a class="mobileNav-link" href="/services/machining.html">Machining</a></li>
            <li><a class="mobileNav-link" href="/services/testing.html">Testing</a></li>
            <li><a class="mobileNav-link" href="/services/product-development.html">Product Development</a></li>
            <li><a class="mobileNav-link" href="/services/logistics.html">Logistics</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="/quality.html">Quality</a>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">About</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Back</a></li>
            <li><a class="mobileNav-link" href="/about/overview.html">Overview</a></li>
            <li><a class="mobileNav-link" href="/about/facilities.html">Facilities</a></li>
            <li><a class="mobileNav-link" href="/about/fundacion-frisa.html">Social Responsability</a></li>
            <li><a class="mobileNav-link" href="/about/downloads.html">Downloads</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="#">Contact Us</a>
          <ul class="mobileNav-dropdown">
            <li><a class="mobileNav-backLink" href="#">Back</a></li>
            <li><a class="mobileNav-link" href="/contact/general-inquiry.html">General Inquiry</a></li>
            <li><a class="mobileNav-link" href="/contact/request-quote.html">Request a quote</a></li>
            <li><a class="mobileNav-link" href="/contact/suppliers-relations.html">Suppliers Relations</a></li>
            <li><a class="mobileNav-link" href="/contact/careers.html">Careers</a></li>
          </ul>
        </li>
        <li class="mobileNav-menuItem">
          <a class="mobileNav-link" href="/es/">Español</a>
        </li>
      </ul>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/scripts/unslider.min.js"></script>
    <script src="/scripts/main.js"></script>
  </body>
</html>