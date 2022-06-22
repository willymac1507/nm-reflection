<?php include 'functions.php' ?>

<section id="offices">
  <div class="offices">
    <div class="bread">
      <div class="bread__container">
        <div class="crumb__container">
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
      </div>
    </div>
    <div class="offices__header">
      <div class="offices__headline-container">
        <h1 class="offices__headline">Our Offices</h1>
      </div>
    </div>
    <div class="offices__container">
      <div class="offices__content">
          <?php
            foreach (getAllOffices() as $office) {
                echo getOfficeCardHtml($office);
            }
            ?>
      </div>
    </div>
  </div>
</section>




