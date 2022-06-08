<?php include 'functions.php'; ?>

<section id="latest">
  <div class="latest">
    <div class="latest__heading-background">
      <div class="latest__heading-container">
        <span class="latest__heading">latest</span>
      </div>
    </div>

    <div class="latest__content-container">
        <?php
        foreach (getAllLatest() as $latest) {
            echo getLatestCardHtml($latest);
        }
        ?>
    </div>

  </div>

</section>

