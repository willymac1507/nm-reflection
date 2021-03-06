<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<section id="contact">
  <div class="contact__container">
      <?php
        include 'inc/contactMessages.php';
        ?>
    <div class="contact-details__container">
      <p class="contact-details__standard">Email us on:</p>
      <p class="contact-details__large">sales@netmatters.com</p>
      <p class="contact-details__standard">Business hours:</p>
      <p class="contact-details__standard">Monday - Friday 07:00 - 18:00</p>
      <p class="contact-details__standard ooh-support">Out of Hours IT Support <span class="down-arrow"></span></p>
      <div class="contact-support__container">
        <p class="contact-support__normal-text">
          Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.
        </p>
        <p class="contact-support__bold-text">
          Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00<br>Sunday 10:00 - 18:00
        </p>
        <p class="contact-support__normal-text">
          To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of
          Hours voicemail. A technician will contact you on the number provided within 45 minutes of your call.
        </p>
      </div>
    </div>

      <?php
        $errorFields = [];
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                $errorFields[] = $error['id'];
            }
        }
        ?>

    <div class="contact-form__container">
      <form method="post" action="inc/sendSupportRequest.php" class="contact-form">
        <div class="contact-form__inputs-container">
          <div class="contact-form__input-group form-group">
            <label for="contact-name" class="contact-form__label required">Your Name</label>
            <input type="text" class="contact-form__input
              <?php
                if (in_array('contact-name', $errorFields)) {
                    echo ' input--invalid';
                }
                ?>
             " id="contact-name" name="name"
                <?php if (isset($_SESSION['name'])) {
                    echo "value={$_SESSION['name']}";
                };
                ?>
            >
          </div>
          <div class="contact-form__input-group form-group">
            <label for="company-name" class="contact-form__label">Company Name</label>
            <input type="text" class="contact-form__input" id="company-name" name="company"
                <?php if (isset($_SESSION['company'])) {
                    echo "value={$_SESSION['company']}";
                };
                ?>
            >
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-email" class="contact-form__label required">Your Email</label>
            <input type="email" class="contact-form__input
                <?php
                if (in_array('contact-email', $errorFields)) {
                    echo ' input--invalid';
                }
                ?>
            " id="contact-email" name="email"
                <?php if (isset($_SESSION['email'])) {
                    echo "value={$_SESSION['email']}";
                };
                ?>
            >
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-tel" class="contact-form__label required">Your Telephone Number</label>
            <input type="tel" class="contact-form__input
                <?php
                if (in_array('contact-tel', $errorFields)) {
                    echo ' input--invalid';
                }
                ?>
            " id="contact-tel" name="telephone"
                <?php if (isset($_SESSION['telephone'])) {
                    echo 'value="' . $_SESSION['telephone'] . '"';
                };
                ?>
            >
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-subject" class="contact-form__label required">Subject</label>
            <input type="text" class="contact-form__input
                <?php
                if (in_array('contact-subject', $errorFields)) {
                    echo ' input--invalid';
                }
                ?>
            " id="contact-subject" name="subject"
                <?php if (isset($_SESSION['subject'])) {
                    echo "value={$_SESSION['subject']}";
                };
                ?>
            >
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-message" class="contact-form__label required">Message</label>
            <textarea class="contact-form__input
                <?php
                if (in_array('contact-message', $errorFields)) {
                    echo ' input--invalid';
                }
                ?>
            contact__message"
                      cols="50"
                      rows="5"
                      id="contact-message"
                      name="message"
              <?php if (isset($_SESSION['message'])) {
                    echo '>' . $_SESSION['message'] . '</textarea>';
              } else {
                  echo '></textarea>';
              };
                ?>
          </div>
          <div class="contact-form__opt-out form-group">
            <div class="contact-form__check-container">
              <input class="contact-form__check" type="checkbox" id="contact-check" name="opt-in"
                     value="1">
            </div>
            <label for="contact-check" class="contact-form__check-label">
              Please tick this box if you wish to receive marketing information from us.
              Please see our <a href="#" class="privacy-link">Privacy Policy</a> for more
              information on how we use your data.
            </label>
          </div>

        </div>
        <a href="#" id="contact-form__submit" class="button button--enquiry">send enquiry</a>
      </form>
    </div>

  </div>
</section>
