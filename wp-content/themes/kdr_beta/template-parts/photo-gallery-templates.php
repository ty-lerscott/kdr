<?php
   class PhotoGalleryTemplate {
      var $template_type;

      function getTemplate($par){
      	$templates = array(
			'homepage' => ['h2','n','w2','n','x2','w2','n','n','n','w2','n','w2','x2','n','h2','n','n','n'],
			'photo_page' => []
      	);
      	return($templates[$par]);
      }
   }
?>