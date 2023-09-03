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
<div class="banner-main-block">
    <div class="banner-main-block-wrapper">
        <div class="banner-main-slider">
	        <?php if ( have_rows( 'banner_slider' ) ) : ?>
		        <?php while ( have_rows( 'banner_slider' ) ) : the_row();
			        $slide = get_sub_field( 'slide' );
                    $img_url = get_field( 'image_for_article_card', $slide->ID );
                    $categories = get_the_category( $slide->ID );
                ?>
                    <div class="banner-main-slider-card" style="background-image: url('<?= $img_url; ?>')">
                        <div class="banner-main-slider-card-top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                            </svg>
                            <span><?= ! empty( $categories[0] ) ? $categories[0]->name : ''; ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="500" height="8" viewBox="0 0 500 8" fill="none">
                                <path d="M499.354 4.35355C499.549 4.15829 499.549 3.84171 499.354 3.64645L496.172 0.464466C495.976 0.269204 495.66 0.269204 495.464 0.464466C495.269 0.659728 495.269 0.976311 495.464 1.17157L498.293 4L495.464 6.82843C495.269 7.02369 495.269 7.34027 495.464 7.53553C495.66 7.7308 495.976 7.7308 496.172 7.53553L499.354 4.35355ZM0 4.5H499V3.5H0V4.5Z" fill="white"/>
                            </svg>
                            <span><?= ! empty( $categories[1] ) ? $categories[1]->name : ''; ?></span>
                        </div>
                        <div class="banner-main-slider-card-bottom">

                        </div>
                    </div>
		        <?php endwhile; ?>
	        <?php endif; ?>
        </div>
        <div class="banner-main-card">

        </div>
    </div>
</div>
