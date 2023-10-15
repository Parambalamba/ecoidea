<?php
/**
 * Main Banner Block
 *
 * @package     Ecoidea
 * @author      Sergei Konovalov
 * @since       1.0.0
 * @license     GPL-2.0+
 */
?>
<div class="wp-block-banner-main" <?= get_block_wrapper_attributes(); ?>>
    <div class="banner-main-block-wrapper site-wrapper">
        <div class="banner-main-slider">
			<?php if ( have_rows( 'banner_slider' ) ) : ?>
				<?php while ( have_rows( 'banner_slider' ) ) : the_row();
					$slide      = get_sub_field( 'slide' );
					$img_url    = get_field( 'image_for_article_card', $slide->ID );
					$categories = get_the_category( $slide->ID );
                    usort( $categories, function ( $a, $b ) {
                        return $a->parent > $b->parent;
                    } );
					?>
                    <div class="banner-main-slider-card" style="background-image: url('<?= $img_url; ?>')">
                        <div class="banner-main-slider-card-top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                            </svg>
                            <?php if ( ! empty( $categories[0] ) ) : ?>
                            <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name ?></a>
                            <?php endif; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="500" height="8" viewBox="0 0 500 8"
                                 fill="none">
                                <path d="M499.354 4.35355C499.549 4.15829 499.549 3.84171 499.354 3.64645L496.172 0.464466C495.976 0.269204 495.66 0.269204 495.464 0.464466C495.269 0.659728 495.269 0.976311 495.464 1.17157L498.293 4L495.464 6.82843C495.269 7.02369 495.269 7.34027 495.464 7.53553C495.66 7.7308 495.976 7.7308 496.172 7.53553L499.354 4.35355ZM0 4.5H499V3.5H0V4.5Z"
                                      fill="white"/>
                            </svg>
                            <?php if ( ! empty( $categories[1] ) ) : ?>
                                <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
                            <?php endif; ?>
                        </div>
                        <a class="banner-main-slider-card-bottom" href="<?= get_permalink( $slide ) ?>">
							<?= get_the_title( $slide->ID ); ?>
                        </a>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>

        </div>
        <div class="banner-main-slider-dots">

        </div>
        <div class="banner-main-card">
			<?php $card = get_field( 'banner_card' ); ?>
            <?php $categories = get_the_category( $card->ID ); ?>
            <?php usort( $categories, function ( $a, $b ) {
                return $a->parent > $b->parent;
            } );
            ?>
			<?php if ( $card ) : ?>
                <div class="banner-main-card-top">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                    </svg>
                    <?php if ( ! empty( $categories[0] ) ) : ?>
                        <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name; ?> </a>
                    <?php endif; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="151" height="8" viewBox="0 0 151 8" fill="none">
                        <path d="M150.354 4.35355C150.549 4.15829 150.549 3.84171 150.354 3.64645L147.172 0.464466C146.976 0.269204 146.66 0.269204 146.464 0.464466C146.269 0.659728 146.269 0.976311 146.464 1.17157L149.293 4L146.464 6.82843C146.269 7.02369 146.269 7.34027 146.464 7.53553C146.66 7.7308 146.976 7.7308 147.172 7.53553L150.354 4.35355ZM0 4.5H150V3.5H0V4.5Z" fill="white"/>
                    </svg>
                    <?php if ( ! empty( $categories[1] ) ) : ?>
                        <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
                    <?php endif; ?>
                </div>
            <div class="banner-main-card-bottom">
                <a class="banner-main-card-bottom-title" href="<?= get_permalink( $card ); ?>"><?= $card->post_title; ?></a>
                <div class="banner-main-card-bottom-desc"><?= $card->post_excerpt; ?></div>
            </div>
			<?php endif; ?>
        </div>
    </div>
</div>
