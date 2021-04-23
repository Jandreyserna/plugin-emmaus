<?php
get_header();

$id_post = get_the_ID();
$post = get_post($id_post);
echo $content = apply_filters('the_content', $post->post_content);

get_footer();
