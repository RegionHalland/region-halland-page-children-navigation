<?php

	/**
	 * @package Region Halland Page Children Navigation
	 */
	/*
	Plugin Name: Region Halland Page Children Navigation
	Description: Front-end-plugin som returnerar Page Children inkl navigation text
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Returnera alla page children till en post
	function get_region_halland_page_children_navigation($minPercent = 25) 
	{
		
		// Wordpress funktion för aktuell post
		global $post;

		// ID för aktuell post
		$myID = $post->ID;
		
		// Argument
		$args = array( 
			'parent' => $myID,
			'hierarchical' => 0,
			'sort_column' => 'menu_order', 
			'sort_order' => 'asc'
		);

		// Hämta valda sidor
		$pages = get_pages($args);

		$countItems = 0;
		$countNavigation = 0;
		
		// Loopa igenom alla sidor
		foreach ($pages as $page) {

			if ($page->ID === $myID) {
				$page->is_current = true;
			}

			// Sidans url
			$page->url = get_page_link($page->ID);
			
			// Utvald bild
			$page->image = get_the_post_thumbnail($page->ID);
			$page->image_url = get_the_post_thumbnail_url($page->ID);

			$page->navigation = get_field('name_1000119', $page->ID);
			
			if (strlen($page->navigation) > 0) {
				$countNavigation++;		
			}

			$countItems++;
		}

		$myStatistic = array();
		$myStatistic['antal'] = $countItems;
		$myStatistic['antal-navigation'] = $countNavigation;
		$myStatistic['procent-navigation'] = intval(floor(100*($countNavigation/$countItems)));
		if ($myStatistic['procent-navigation'] >= $minPercent) {
			$myStatistic['show-navigation'] = 1;
		} else {
			$myStatistic['show-navigation'] = 0;
		}

		// Dela upp i arrayer per label	
		$myMultiPages = array();
		$myMultiPages['statistic'] = $myStatistic;
		$myMultiPages['pages'] = $pages;
		
		// Returnera alla sidor
		return $myMultiPages;

	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_page_children_navigation_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_page_children_navigation_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_page_children_navigation_activate');
	
	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_page_children_navigation_deactivate');

?>