<?php
/**
 * Structured article body.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

$blocks = argokov_field( 'material_blocks', array() );

if ( ! is_array( $blocks ) ) {
	$blocks = array();
}

foreach ( $blocks as $block ) :
	$layout = isset( $block['acf_fc_layout'] ) ? $block['acf_fc_layout'] : '';

	switch ( $layout ) {
		case 'intro':
			if ( ! empty( $block['text'] ) ) :
				?>
				<p class="article-intro"><?php echo esc_html( $block['text'] ); ?></p>
				<?php
			endif;
			break;

		case 'callout':
			$variant = isset( $block['variant'] ) && 'important' === $block['variant'] ? ' article-callout--important' : '';
			?>
			<div class="article-callout<?php echo esc_attr( $variant ); ?>">
				<?php if ( ! empty( $block['title'] ) ) : ?><strong><?php echo esc_html( $block['title'] ); ?></strong><?php endif; ?>
				<?php if ( ! empty( $block['text'] ) ) : ?><p><?php echo esc_html( $block['text'] ); ?></p><?php endif; ?>
			</div>
			<?php
			break;

		case 'section':
			$anchor = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : sanitize_title( $block['title'] ?? '' );
			?>
			<section<?php if ( $anchor ) : ?> id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?>>
				<?php if ( ! empty( $block['title'] ) ) : ?><h2><?php echo esc_html( $block['title'] ); ?></h2><?php endif; ?>
				<?php if ( ! empty( $block['content'] ) ) : ?><?php echo wp_kses_post( $block['content'] ); ?><?php endif; ?>
			</section>
			<?php
			break;

		case 'checklist':
			$items = isset( $block['items'] ) && is_array( $block['items'] ) ? $block['items'] : array();
			?>
			<div class="article-checklist">
				<?php if ( ! empty( $block['title'] ) ) : ?><h3><?php echo esc_html( $block['title'] ); ?></h3><?php endif; ?>
				<?php if ( $items ) : ?><ul><?php foreach ( $items as $item ) : ?><li><?php echo esc_html( $item['text'] ?? '' ); ?></li><?php endforeach; ?></ul><?php endif; ?>
			</div>
			<?php
			break;

		case 'code':
			?>
			<figure class="article-code">
				<div class="article-code__head">
					<div><span><?php echo esc_html( $block['language'] ?? '' ); ?></span><strong><?php echo esc_html( $block['filename'] ?? '' ); ?></strong></div>
					<button type="button" aria-label="<?php echo esc_attr( 'Копировать код' . ( ! empty( $block['filename'] ) ? ' из ' . $block['filename'] : '' ) ); ?>">Копировать</button>
				</div>
				<pre tabindex="0"><code><?php echo esc_html( $block['code'] ?? '' ); ?></code></pre>
				<?php if ( ! empty( $block['caption'] ) ) : ?><figcaption><?php echo esc_html( $block['caption'] ); ?></figcaption><?php endif; ?>
			</figure>
			<?php
			break;

		case 'mistakes':
			$items = isset( $block['items'] ) && is_array( $block['items'] ) ? $block['items'] : array();

			if ( $items ) :
				?>
				<div class="article-mistakes">
					<?php foreach ( $items as $item ) : ?>
						<article>
							<span><?php echo esc_html( $item['number'] ?? '' ); ?></span>
							<div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div>
						</article>
					<?php endforeach; ?>
				</div>
				<?php
			endif;
			break;

		case 'conclusion':
			?>
			<section class="article-conclusion">
				<?php if ( ! empty( $block['eyebrow'] ) ) : ?><p class="section-eyebrow"><?php echo esc_html( $block['eyebrow'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $block['title'] ) ) : ?><h2><?php echo esc_html( $block['title'] ); ?></h2><?php endif; ?>
				<?php if ( ! empty( $block['text'] ) ) : ?><p><?php echo esc_html( $block['text'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $block['button_label'] ) ) : ?><a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( $block['button_label'] ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
			</section>
			<?php
			break;
	}
endforeach;
