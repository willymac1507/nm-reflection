<?php
$refArray = explode('?', $_SERVER['REQUEST_URI']);
$errorFields = [];
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        $errorFields[] = $error['id'];
    }
}
?>

<section id="newsletter">
    <div class="newsletter">
        <form method="post" action="inc/sendNewsletterRequest.php?referrer=<?php echo $refArray[0] ?>" class="news-form">
            <div class="news-form__title">Email Newsletter Sign-Up</div>
            <div class="news-form__inputs-container">
                <div class="news-form__input-group form-group">
                    <label for="news-name" class="news-form__label required">Your Name</label>
                    <input type="text" class="news-form__input
<?php
if (in_array('news-name', $errorFields)) {
    echo ' input--invalid';
}
?>
                    " id="news-name" name="name"
                        <?php if (isset($_SESSION['name'])) {
                            echo "value={$_SESSION['name']}";
                        };
                        ?>
                    >
                </div>
                <div class="news-form__input-group form-group">
                    <label for="news-email" class="news-form__label required">Your Email</label>
                    <input type="email" class="news-form__input
<?php
if (in_array('news-email', $errorFields)) {
    echo ' input--invalid';
}
?>
                    " id="news-email" name="email"
                        <?php if (isset($_SESSION['email'])) {
                            echo "value={$_SESSION['email']}";
                        };
                        ?>
                    >
                </div>
                <div class="news-form__opt-out form-group">
                    <div class="news-form__check-container">
                        <input class="news-form__check" type="checkbox" id="news-check" name="opt-in"
                               value="1">
                    </div>
                    <label for="news-check" class="news-form__check-label">
                        Please tick this box if you wish to receive marketing information from us.
                        Please see our <a href="#" class="privacy-link">Privacy Policy</a> for more
                        information on how we use your data.
                    </label>
                </div>

            </div>
            <a href="#" class="button button--subscribe">subscribe</a>
        </form>
    </div>
</section>

