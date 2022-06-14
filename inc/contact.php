<?php include 'functions.php' ?>

<section id="contact">
  <div class="contact">
    <div class="bread__container">
      <ul class="bread__list">
        <li class="bread__home">
          <a href="/">Home</a></li>
          <?php
            foreach (buildBreadcrumbs() as $crumb) {
                echo '<li class="bread__crumb">'
                . $crumb
                . '</li>';
            }
            ?>
      </ul>
    </div>
    <div class="contact__header">
      <h1 class="contact__headline">Our Offices</h1>
    </div>
    <div class="contact__container">
      <div class="contact__content">
          <?php
            foreach (getAllOffices() as $office) {
                echo getOfficeCardHtml($office);
            }
            ?>
      </div>
    </div>
  </div>
</section>




