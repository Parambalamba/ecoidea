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
$url = get_field("donate_url");
$text = get_field("text_on_button");

?>

<div class="search-donate-wrapper">
	<div class="search-donate-icon"><?= $img ?></div>
	<a class="search-donate-button" href="#"><?= $text ?>></a>
</div>

