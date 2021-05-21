#
function wdo_user_redirect() {
    if (! is_user_logged_in() && (is_woocommerce() || is_cart() || is_checkout())) {
        wp_redirect('https://theappartment.it/'); // if user not logged in redirect them to Home page. if you want to redirect on any other page set Url your destination page.
        exit;
    }
}
add_action('template_redirect', 'wdo_user_redirect');
