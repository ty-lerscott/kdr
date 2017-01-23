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
$background = "background:url($rand_img);";
$background .="background-size:cover;";
$background .="background-position:center center;";

get_header();

?>

<div id="page" class="site">
	<div id="content" class="site-content">
		<section class="hero_banner" style="<?php echo($background); ?>">
			<div class="barker_content">
				<h1><?php echo($herobanner_text); ?></h1>
				<h2><?php echo($herobanner_subtext); ?></h2>
			</div>
			<div class="hero_banner_overlay"></div>
			<figure>
			</figure>
		</section>
	</div>

	<!-- <section class="section5">
		<div class="map_wrapper">
			<?php
			//  echo $map;
			  ?>
		</div>
	</section> -->


<?php get_footer();
