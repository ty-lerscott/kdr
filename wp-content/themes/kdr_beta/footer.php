<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kappa_Delta_Rho_Beta
 */

?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper page-wrapper">
			<figure>
				<img src="<?php echo(get_template_directory_uri() . '/images/whitecrest.png'); ?>" alt="crest" />
			</figure>
			<div class="menu-wrapper">
				<?php 
				$menu = wp_get_nav_menu_items( 'Footer Menu', ['orderby' => 'menu_order','post_type' => 'nav_menu_item']); 
				$menu_organized = getMenuParentList($menu);
				$count=1;
				foreach($menu_organized as $_menu=>$submenu): ?>
					<div class="footer-menu menu-<?php echo($count); ?>">
						<span class="footer-menu-header"><?php echo($_menu); ?></span>
						<ul>
						<?php foreach($submenu as $_submenu): ?>
							<li><a href="<?php echo($_submenu->url); ?>"><?php echo($_submenu->title); ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>

				<?php $count++; endforeach; ?>
			</div>

			<div class="copyright">
				<h5>312 Highland Road &bull; Ithaca, New York &bull; 14850</h5>
				<h5>&copy; <?php echo(date('Y'));?> <a href="http://www.kdr.com">Kappa Delta Rho National Fraternity</a> | Beta Chapter "Honor Super Omnia!"</h5> 
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
