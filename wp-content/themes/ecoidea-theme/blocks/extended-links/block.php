<?php
/**
 * Extended Links Block
 *
 * @package     Ecoidea
 * @author      Sergei Konovalov
 * @since       1.0.0
 * @license     GPL-2.0+
 */
?>
<div class="extended-link-block">
    <div class="extended-links-wrapper">
		<?php if ( have_rows( 'extended_link' ) ) : ?>
			<?php while ( have_rows( "extended_link" ) ) : the_row();
				$icon = get_sub_field( 'link_icon' );
				$text = esc_attr( get_sub_field( 'link_text' ) );
				$url  = esc_attr( get_sub_field( 'link_url' ) );
				?>
                <div class="extended-link-item">
                    <img src="<?= $icon ?>" alt="<?= $text ?>">
                    <a href="<?= $url ?>"><?= $text ?></a>
                </div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php echo( "Add links for this block" ); ?>
		<?php endif; ?>
    </div>
</div>
