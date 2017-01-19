<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package kdr_beta
*/

// include_once 'template-parts/photo-gallery-templates.php';
// $gallery_template = new PhotoGalleryTemplate();

$fields = array(
	'herobanner_images'		=> 'hero_images',
	'herobanner_text' 		=> 'hero_banner_barker_text',
	'herobanner_subtext' 	=> 'hero_banner_barker_subtext',
	'section1_video' 		=> 'section_1_video',
	'section1_blurb'		=> 'section_1_blurb',
	'officers'				=> 'officers',
	'section3_text'			=> 'section_3_title',
	'section3_paragraph'	=> 'section_3_paragraph',
	'gallery'				=> 'image_gallery_shortcode',
	'map'					=> 'where_are_we'
);
foreach ( $fields as $key => $val):
	$$key = get_field('homepage_content')[0][$val];
endforeach;

$rand_num = rand(0, sizeOf($herobanner_images)-1);
$rand_img = $herobanner_images[$rand_num]['image'];
get_header();

?>



<?php get_footer();
