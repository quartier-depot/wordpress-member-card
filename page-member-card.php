<?php
/**
 * Template Name: Member Card
 */
function add_qrcodejs_script() {
  wp_enqueue_script('qrcodejs', 
    get_theme_file_uri() . '/lib/qrcodejs/qrcode.min.js',
    array(), 
    false,
    false);
}

add_action('wp_enqueue_scripts', 'add_qrcodejs_script');
 
get_header();

the_title('<h1>', '</h1>');

$user_id = get_current_user_id();
if (!$user_id) {
  echo "Bitte einloggen.";
} else { 
  $field_value = get_field('member_id', 'user_' . $user_id);
  if (!$field_value) {
    echo "Für dich ist noch keine Mitgliederkarte erfasst.";
  } else {
    echo "<div id='qrcode'></div>";
    echo "<script type='text/javascript'>new QRCode(document.getElementById('qrcode'), '" . $field_value . "');</script>";
  }
}

get_footer();
?>
