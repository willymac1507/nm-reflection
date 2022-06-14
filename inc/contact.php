<?php //include 'functions.php' ?>

<section id="contact">
  <div class="contact__container">
    <div class="contact-details__container">
      <p class="contact-details__standard">Email us on:</p>
      <p class="contact-details__large">sales@netmatters.com</p>
      <p class="contact-details__standard">Business hours:</p>
      <p class="contact-details__standard">Monday - Friday 07:00 - 18:00</p>
      <p class="contact-details__standard">Out of Hours IT Support <span class="down-arrow"></span></p>
    </div>
    <div class="contact-form__container">
      <form method="post" class="contact-form">
        <div class="contact-form__inputs-container">
          <div class="contact-form__input-group form-group">
            <label for="contact-name" class="contact-form__label required">Your Name</label>
            <input type="text" class="contact-form__input" id="contact-name" name="name">
          </div>
          <div class="contact-form__input-group form-group">
            <label for="company-name" class="contact-form__label">Company Name</label>
            <input type="text" class="contact-form__input" id="company-name" name="company">
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-email" class="contact-form__label required">Your Email</label>
            <input type="email" class="contact-form__input" id="contact-email" name="email">
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-tel" class="contact-form__label required">Your Telephone Number</label>
            <input type="tel" class="contact-form__input" id="contact-tel" name="telephone">
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-subject" class="contact-form__label required">Subject</label>
            <input type="text" class="contact-form__input" id="contact-subject" name="subject">
          </div>
          <div class="contact-form__input-group form-group">
            <label for="contact-message" class="contact-form__label required">Message</label>
            <textarea cols="50" rows="5" class="contact-form__input" id="contact-message" name="telephone">
                        </textarea>
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
        <a href="#" class="button button--enquiry">send enquiry</a>
      </form>
    </div>

  </div>
</section>
