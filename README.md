NoCAPTCHA-reCAPTCHA-PHP
=======================

NoCAPTCHA reCAPTCHA display and verify PHP function.

Document: https://developers.google.com/recaptcha/

Example
=======

* function recaptcha_display()
```php
    <?php include('nocaptcha-recaptcha.php'); ?>
    <form action="?" method="post">
    <?php echo recaptcha_display(); ?>
    <input type="submit">
    </form>
```

* function recaptcha_vertify($response)
```php
    <?php
    include('nocaptcha-recaptcha.php');
    $response = $_POST['g-recaptcha-response'];

    if (!recaptcha_vertify($response)) {
        echo "Failed";
        exit;
    }
    ?>
```
