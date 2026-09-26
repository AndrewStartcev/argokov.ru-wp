<?php
/**
 * Comments helpers for materials.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

function argokov_comment_callback( $comment, $args, $depth ) {
	$author_name = get_comment_author( $comment );
	$initials    = '';

	foreach ( preg_split( '/\s+/u', trim( $author_name ) ) as $part ) {
		if ( '' !== $part ) {
			$initials .= mb_substr( $part, 0, 1 );
		}
	}

	$initials = mb_strtoupper( mb_substr( $initials, 0, 2 ) );
	$is_author = user_can( $comment->user_id, 'edit_posts' );
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<article class="comment-body<?php echo $is_author ? ' comment-body--author' : ''; ?>">
			<div class="comment-author-avatar<?php echo $is_author ? ' comment-author-avatar--author' : ''; ?>" aria-hidden="true"><?php echo esc_html( $initials ?: '—' ); ?></div>

			<div>
				<header class="comment-body__meta">
					<div>
						<strong class="comment-body__author"><?php echo esc_html( $author_name ); ?></strong>
						<?php if ( $is_author ) : ?><span class="comment-body__badge comment-body__badge--author">Автор</span><?php endif; ?>
						<?php if ( '0' === $comment->comment_approved ) : ?><span class="comment-body__badge">На проверке</span><?php endif; ?>
					</div>
					<time datetime="<?php echo esc_attr( get_comment_date( 'c', $comment ) ); ?>"><?php echo esc_html( get_comment_date( 'j F, H:i', $comment ) ); ?></time>
				</header>

				<div class="comment-body__text"><?php comment_text( $comment ); ?></div>

				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text'=> 'Ответить',
						)
					),
					$comment
				);
				?>
			</div>
		</article>
	<?php
}

function argokov_require_comment_privacy_consent( $commentdata ) {
	if ( is_user_logged_in() ) {
		return $commentdata;
	}

	$consent = isset( $_POST['privacy_consent'] ) ? sanitize_text_field( wp_unslash( $_POST['privacy_consent'] ) ) : '';

	if ( 'yes' !== $consent ) {
		wp_die(
			esc_html__( 'Нужно подтвердить согласие на обработку персональных данных.', 'argokov' ),
			esc_html__( 'Не удалось отправить комментарий', 'argokov' ),
			array( 'response' => 400, 'back_link' => true )
		);
	}

	return $commentdata;
}
add_filter( 'preprocess_comment', 'argokov_require_comment_privacy_consent' );

function argokov_save_comment_privacy_consent( $comment_id ) {
	if ( isset( $_POST['privacy_consent'] ) && 'yes' === sanitize_text_field( wp_unslash( $_POST['privacy_consent'] ) ) ) {
		add_comment_meta( $comment_id, '_argokov_privacy_consent', 'yes', true );
	}
}
add_action( 'comment_post', 'argokov_save_comment_privacy_consent' );
