<?php
/**
 * Template Name: History Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
$fields = array(
	'herobanner_images'		=> 'hero_images',
	'herobanner_text' 		=> 'hero_banner_barker_text',
	'herobanner_subtext' 	=> 'hero_banner_barker_subtext',
	'section1_video' 		=> 'section_1_video',
	'section1_history' 		=> 'section_1_history'
);
foreach ( $fields as $key => $val):
	$$key = get_field('history_content')[0][$val];
endforeach;
$rand_num = rand(0, sizeOf($herobanner_images)-1);
$rand_img = $herobanner_images[$rand_num]['image'];
get_header('homepage'); 
?>

<div id="page" class="site">
	<div id="content" class="site-content">
		<section class="hero_banner">
			<div class="barker_content">
				<h1><?php echo($herobanner_text); ?></h1>
				<h2><?php echo($herobanner_subtext); ?></h2>
			</div>
			<div class="hero_banner_overlay"></div>
			<figure>
				<img src="<?php echo($rand_img); ?>" alt="" />
			</figure>
		</section>
		<div>
			<div class="section_wrapper page-wrapper">
				<section class="section1 history">
					<iframe src="<?php echo($section1_video); ?>" frameborder="0" allowfullscreen></iframe>
					<p class="history_content">
						<?php echo($section1_history); ?>
					</p>
				</section>
			</div>
<?php get_footer();