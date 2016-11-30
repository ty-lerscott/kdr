<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
$fields = array(
	'herobanner_images'		=> 'hero_images',
	'herobanner_text' 		=> 'hero_banner_barker_text',
	'herobanner_subtext' 	=> 'hero_banner_barker_subtext',
	'about' 				=> 'about',
	'motto' 				=> 'motto',
	'mission' 				=> 'mission',
	'credo' 				=> 'credo',
	'precepts' 				=> 'precepts',
	'more_info' 			=> 'more_info'
);
foreach ( $fields as $key => $val):
	$$key = get_field('about')[0][$val];
endforeach;
$rand_num = rand(0, sizeOf($herobanner_images)-1);
$rand_img = $herobanner_images[$rand_num]['image'];
get_header('homepage'); 
?>

<div id="page" class="site">
	<div id="content" class="site-content about">
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
				<section class="section1">
					<p class="page-wrapper"><?php echo($about); ?></p>
					<p class="page-wrapper"><?php echo($motto); ?></p>
				</section>
			</div>

			<div class="section_wrapper page-wrapper">
				<section class="section2">
					<div class="section2_background">
						<div class="texture"></div>
					</div>
					<div class="positioning_wrapper">
						<h2>Beta Chapter Mission Statement</h2>
						<p class="page-wrapper"><?php echo($mission); ?></p>
					</div>
				</section>
			</div>

			<div class="section_wrapper page-wrapper">
				<section class="section3">
				<h2>Kappa Delta Rho Credo</h2>
				<p><?php echo($credo); ?></p>
				</section>
			</div>

			<div class="section_wrapper page-wrapper">
				<section class="section4">
					<div class="section4_background">
						<div class="texture"></div>
					</div>
					<div class="positioning_wrapper">
						<h2>Kappa Delta Rho Precepts</h2>
						<p class="page-wrapper"><?php echo($precepts); ?></p>
					</div>
				</section>
			</div>
			<div class="section_wrapper page-wrapper">
				<section class="section5">
				
				<p class="page-wrapper"><?php echo($more_info); ?></p>
				</section>
			</div>
<?php get_footer();