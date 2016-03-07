<div id="bread_wrap">
	<?php
		if ( is_page( '25' ) ) {
			echo "<p class=\"cover_music\">MUSIC</p>";
		} 
		elseif ( is_page( '102' ) ){
			echo "<p class=\"cover_film\">FILM</p>";
		}
		elseif ( is_page( '104' ) ){
			echo "<p class=\"cover_tv\">TELEVISION</p>";
		}
		elseif ( is_page( '106' ) ){
			echo "<p class=\"cover_art\">ART & FASHION</p>";
		}
		elseif ( is_page( '108' ) ){
			echo "<p class=\"cover_society\">SOCIETY & POLITICS</p>";
		}
		elseif ( is_page( '111' ) ){
			echo "<p class=\"cover_food\">FOOD & TRAVEL</p>";
		}
		elseif ( is_page( '113' ) ){
			echo "<p class=\"cover_lit\">LITERATURE</p>";
		}
		elseif ( is_page( '115' ) ){
			echo "<p class=\"cover_tech\">IT, MEDIA & TECH</p>";
		}
		elseif ( is_page( '8' ) ){
			echo "<p class=\"dark_bread\">COVER STORIES</p>";
		}
		elseif ( is_page( '11' ) ){
			echo "<p class=\"cover_about\">ABOUT</p>";
		}
		elseif ( is_page( '118' ) ){
			echo "<p class=\"cover_photo\">PHOTOGRAPHY</p>";
		}
		elseif ( is_page( '100' ) ){
			echo "<p class=\"dark_bread\">COVER STORIES <span class=\"small_select\">(IN SELECTION)</span></p>";
		}
		else {

		}
	?>
</div>