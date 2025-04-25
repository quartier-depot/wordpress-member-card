<?php
/**
 * Template Name: Member Card
 */
get_header();

$user_id = get_current_user_id();
$field_value = get_field('member_id', 'user_' . $user_id);

echo '<h2>User Field Value:</h2>';
echo esc_html($field_value);

get_footer();
?>