<?php
/**
 * Main Post Grid Plock
 *
 * @package     Ecoidea
 * @author      Sergei Konovalov
 * @since       1.0.0
 * @license     GPL-2.0+
 */
?>
<div class="wp-block-main-post-grid" <?= get_block_wrapper_attributes(); ?>>
	<?php if ( have_rows( 'cards' ) ) : ?>
        <div class="site-wrapper <?= get_field( 'posts_layout_type' ) ?>">
			<?php while ( have_rows( 'cards' ) ) :
				the_row();
				$card_item      = get_sub_field( 'card_item' );
				$card_item_type = get_sub_field( 'card_item_type' );
				$categories     = get_the_category( $card_item->ID );
				usort( $categories, function ( $a, $b ) {
					return $a->parent > $b->parent;
				} );
				?>
				<?php if ( $card_item_type === 'type1' ) : ?>
                <div class="card-item <?= $card_item_type ?> card-item-<?= get_row_index() ?>">
                    <div class="card-item-top"
                         style="background-image: url('<?= get_the_post_thumbnail_url( $card_item, array(
						     360,
						     480
					     ) ); ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                             fill="none">
                            <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                        </svg>
						<?php if ( ! empty( $categories[0] ) ) : ?>
                            <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name ?></a>
						<?php endif; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="71" height="8" viewBox="0 0 71 8" fill="none">
                            <path d="M70.3536 4.35355C70.5488 4.15829 70.5488 3.84171 70.3536 3.64645L67.1716 0.464466C66.9763 0.269204 66.6597 0.269204 66.4645 0.464466C66.2692 0.659728 66.2692 0.976311 66.4645 1.17157L69.2929 4L66.4645 6.82843C66.2692 7.02369 66.2692 7.34027 66.4645 7.53553C66.6597 7.7308 66.9763 7.7308 67.1716 7.53553L70.3536 4.35355ZM0 4.5H70V3.5H0V4.5Z"
                                  fill="white"/>
                        </svg>
						<?php if ( ! empty( $categories[1] ) ) : ?>
                            <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
						<?php endif; ?>
                    </div>
                    <div class="card-item-bottom">
                        <a href="<?= get_permalink( $card_item ); ?>"><?= get_the_title( $card_item ); ?></a>
                    </div>
                </div>
			<?php elseif ( $card_item_type === 'type2' ) : ?>
                <div class="card-item <?= $card_item_type ?> card-item-<?= get_row_index() ?>">
                    <div class="card-item-top"
                         style="background-image: url('<?= get_the_post_thumbnail_url( $card_item, array(
						     360,
						     480
					     ) ); ?>')">
                        <div class="upper-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                            </svg>
							<?php if ( ! empty( $categories[0] ) ) : ?>
                                <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name ?></a>
							<?php endif; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="71" height="8" viewBox="0 0 71 8"
                                 fill="none">
                                <path d="M70.3536 4.35355C70.5488 4.15829 70.5488 3.84171 70.3536 3.64645L67.1716 0.464466C66.9763 0.269204 66.6597 0.269204 66.4645 0.464466C66.2692 0.659728 66.2692 0.976311 66.4645 1.17157L69.2929 4L66.4645 6.82843C66.2692 7.02369 66.2692 7.34027 66.4645 7.53553C66.6597 7.7308 66.9763 7.7308 67.1716 7.53553L70.3536 4.35355ZM0 4.5H70V3.5H0V4.5Z"
                                      fill="white"/>
                            </svg>
							<?php if ( ! empty( $categories[1] ) ) : ?>
                                <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
							<?php endif; ?>
                        </div>
                        <a class="type2-title"
                           href="<?= get_permalink( $card_item ); ?>"><?= get_the_title( $card_item ); ?></a>
                    </div>
                </div>
			<?php elseif ( $card_item_type === 'type3' ) : ?>
                <div class="card-item <?= $card_item_type ?> card-item-<?= get_row_index() ?>"
                     style="background: linear-gradient(180deg, #FFF 0%, #FF8947 100%);">
                    <div class="card-item-top">
                        <div class="upper-row">
                            <span><?= get_sub_field( 'third_party_type' ); ?></span>
                        </div>
                        <div class="bottom-row">
							<?php $third_party_link = get_sub_field( 'third_party_link' ); ?>
                            <a href="<?= $third_party_link['url'] ?>" target="<?= $third_party_link['target'] ?>">
                                <img src="<?= get_sub_field( 'third_party_animated_title' ); ?>" alt="" width="100"
                                     height="113">
                                <img src="<?= get_sub_field( 'third_party_icon' ); ?>" alt="" width="260" height="260">
                            </a>
                        </div>
                    </div>
                </div>
			<?php elseif ( $card_item_type === 'type4' ) : ?>
                <div class="card-item <?= $card_item_type ?> card-item-<?= get_row_index() ?>">
                    <div class="card-item-top">
                        <div class="upper-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                             fill="none">
                            <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                        </svg>
						<?php if ( ! empty( $categories[0] ) ) : ?>
                            <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name ?></a>
						<?php endif; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="8" viewBox="0 0 130 8" fill="none">
                            <path d="M129.354 4.35355C129.549 4.15829 129.549 3.84171 129.354 3.64645L126.172 0.464466C125.976 0.269204 125.66 0.269204 125.464 0.464466C125.269 0.659728 125.269 0.976311 125.464 1.17157L128.293 4L125.464 6.82843C125.269 7.02369 125.269 7.34027 125.464 7.53553C125.66 7.7308 125.976 7.7308 126.172 7.53553L129.354 4.35355ZM0 4.5H129V3.5H0V4.5Z" fill="#667285"/>
                        </svg>
                        <?php if ( ! empty( $categories[1] ) ) : ?>
                            <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
						<?php endif; ?>
                        </div>
                        <div class="bottom-row">
                            <a href="<?= get_permalink( $card_item ); ?>"><?= get_the_title( $card_item ); ?></a>
                        </div>
                    </div>
                    <div class="card-item-bottom"
                         style="background-image: url('<?= get_the_post_thumbnail_url( $card_item, array(
						     360,
						     480
					     ) ); ?>')">
                    </div>
                </div>
            <?php elseif ( $card_item_type === 'type5' ) : ?>
            <div class="card-item <?= $card_item_type ?> card-item-<?= get_row_index() ?>">
                <div class="card-item-top">
                    <div class="upper-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                             fill="none">
                            <circle cx="6" cy="6" r="6" fill="#F75BB8"/>
                        </svg>
				        <?php if ( ! empty( $categories[0] ) ) : ?>
                            <a href="<?= get_category_link( $categories[0] ) ?>"><?= $categories[0]->name ?></a>
				        <?php endif; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="157" height="8" viewBox="0 0 157 8" fill="none">
                            <path d="M156.354 4.35355C156.549 4.15829 156.549 3.84171 156.354 3.64645L153.172 0.464466C152.976 0.269204 152.66 0.269204 152.464 0.464466C152.269 0.659728 152.269 0.976311 152.464 1.17157L155.293 4L152.464 6.82843C152.269 7.02369 152.269 7.34027 152.464 7.53553C152.66 7.7308 152.976 7.7308 153.172 7.53553L156.354 4.35355ZM0 4.5H156V3.5H0V4.5Z" fill="#667285"/>
                        </svg>
                        <?php if ( ! empty( $categories[1] ) ) : ?>
                            <a href="<?= get_category_link( $categories[1] ) ?>"><?= $categories[1]->name ?></a>
				        <?php endif; ?>
                    </div>
                    <div class="bottom-row">
                        <a href="<?= get_permalink( $card_item ); ?>"><?= get_the_title( $card_item ); ?></a>
                    </div>
                </div>
            </div>
			<?php endif; ?>
			<?php endwhile; ?>
        </div>
	<?php endif; ?>
</div>
