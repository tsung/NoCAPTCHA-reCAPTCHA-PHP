<?php
define('RECAPTCHA_SECRET_KEY', '');
define('RECAPTCHA_SITE_KEY', '');

// {{{ function recaptcha_vertify($response)
/**
 * $response  = $_POST['g-recaptcha-response'];
 *
 * Document:
 *   API 申請: https://www.google.com/recaptcha/admin#list
 *   Displaying the widget: https://developers.google.com/recaptcha/docs/display
 *   Verifying the user's response: https://developers.google.com/recaptcha/docs/verify
 */
function recaptcha_vertify($response)
{
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s&remoteip=%s';
    $url = sprintf($url, RECAPTCHA_SECRET_KEY, $response, $_SERVER['REMOTE_ADDR']);

    $status = file_get_contents($url);
    $r = json_decode($status);

    return (isset($r->success) && $r->success) ? true : false;
}
// }}}
// {{{ function recaptcha_display()
/**
 * Document:
 *   API 申請: https://www.google.com/recaptcha/admin#list
 *   Displaying the widget: https://developers.google.com/recaptcha/docs/display
 *   Verifying the user's response: https://developers.google.com/recaptcha/docs/verify
 */
function recaptcha_display()
{
    return '<script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="' . RECAPTCHA_SITE_KEY . '"></div>';
}
// }}}
?>
