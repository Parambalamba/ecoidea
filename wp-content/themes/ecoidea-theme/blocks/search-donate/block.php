<?php
/**
 * Search Donate Block
 *
 * @package     Ecoidea
 * @author      Sergei Konovalov
 * @since       1.0.0
 * @license     GPL-2.0+
 */

$img = get_field("search_icon" );
$url = esc_attr( get_field("donate_url") );
$text = esc_attr( get_field("text_on_button") );

?>

<div class="search-donate-wrapper">
	<img class="search-donate-icon" src="<?= $img ?>" alt="Search Icon" width="24" height="24">
	<a class="search-donate-button" href="<?= $url; ?>"><?= $text ?></a>
</div>

