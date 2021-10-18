<?php
/**
 * Class for redirecting to pages
 */

class Redirect {
    public static function to($location = null) {
        if($location) {
            if(is_numeric($location)) {
                switch($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        break;
                }
            }
            // header('Location: '. $location);
            header('Location: ' . Config::get('server/name') .'/'. $location);
            exit();
        }
    }
}