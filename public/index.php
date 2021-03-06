<?php
/**
 * Inline Games - Telegram Bot (@inlinegamesbot)
 *
 * (c) 2017 Jack'lul <jacklulcat@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Bot\Bot;

/**
 * Composer autoloader
 */
require __DIR__ . ' /../lib/autoload.php';

/**
 * Handle webhook request only when it's a POST request
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $app = new Bot(true);
        $app->run();
    } catch (\Throwable $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);    // On error return HTTP 500 so that Telegram API can retry request later
    }
} else {    // Redirect non-POST requests to Github repository
    header("Location: https://github.com/jacklul/inlinegamesbot");
}
