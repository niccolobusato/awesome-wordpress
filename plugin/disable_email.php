<?php
/*
Plugin Name: Disattiva email cambio password
Description: Piccolo plugin che disattiva le email all'admin nel momento in cui un utente cambia la propria password
*/

if (!function_exists('wp_password_change_notification')) {
    function wp_password_change_notification($user) {
        return;
    }
}
?>
