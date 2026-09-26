<?php
/**
 * Comments template for materials.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}

$count = get_comments_number();
?>
<section class="article-comments surface" id="comments" aria-labelledby="comments-title">
	<header class="article-comments__heading">
		<div>
			<p class="section-eyebrow">Обсуждение</p>
			<h2 id="comments-title">Комментарии <span><?php echo (int) $count; ?></span></h2>
		</div>
		<p>Задай вопрос по статье или расскажи о похожей ситуации. Отвечаем по существу и не публикуем контактные данные.</p>
	</header>

	<?php if ( have_comments() ) : ?>
		<div class="comment-list" aria-live="polite">
			<ol class="comment-list__items">
				<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'avatar_size' => 0,
						'short_ping'  => true,
						'callback'    => 'argokov_comment_callback',
					)
				);
				?>
			</ol>

			<?php the_comments_navigation(); ?>
		</div>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<?php
		$commenter = wp_get_current_commenter();

		comment_form(
			array(
				'class_form'           => 'comment-form',
				'id_form'              => 'respond',
				'title_reply'          => 'Присоединиться к обсуждению',
				'title_reply_before'   => '<div class="comment-form__title"><div><span>Оставить комментарий</span><strong>',
				'title_reply_after'    => '</strong></div><small>Поля со звёздочкой обязательны</small></div>',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'label_submit'         => 'Отправить комментарий',
				'class_submit'         => 'button',
				'submit_field'         => '<div class="comment-form__footer">%1$s %2$s<p>Комментарий появится после проверки. Спам и рекламные ссылки удаляем.</p></div>',
				'fields'               => array(
					'author' => '<div class="comment-form__fields"><label><span>Имя *</span><input type="text" autocomplete="name" placeholder="Как к тебе обращаться" required name="author" value="' . esc_attr( $commenter['comment_author'] ) . '"></label>',
					'email'  => '<label><span>Email *</span><input type="email" autocomplete="email" placeholder="Не будет опубликован" required name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '"></label>',
					'cookies'=> '</div><div class="comment-form__options"><label><input type="checkbox" name="wp-comment-cookies-consent" value="yes"><span>Сохранить моё имя и email в этом браузере для следующих комментариев</span></label><label><input type="checkbox" required name="privacy_consent" value="yes"><span>Даю <a href="' . esc_url( home_url( '/consent/' ) ) . '">согласие на обработку персональных данных</a> и подтверждаю, что ознакомился с <a href="' . esc_url( home_url( '/privacy/' ) ) . '">политикой обработки персональных данных</a></span></label></div>',
				),
				'comment_field'         => '<div class="comment-form__fields"><label class="comment-form__message"><span>Комментарий *</span><textarea name="comment" rows="6" placeholder="Напиши вопрос или поделись опытом" required></textarea></label></div>',
			)
		);
		?>
	<?php endif; ?>
</section>
