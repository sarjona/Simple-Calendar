<?php
/**
 * Newsletter Sign Up Meta Box
 *
 * @package SimpleCalendar/Admin
 */
namespace SimpleCalendar\Admin\Metaboxes;

use SimpleCalendar\Abstracts\Meta_Box;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sign up to Simple Calendar newsletter.
 *
 * @since 3.0.0
 */
class Newsletter implements Meta_Box {

	/**
	 * Output HTML.
	 *
	 * @since 3.0.0
	 *
	 * @param \WP_Post $post
	 */
	public static function html( $post ) {

		global $current_user;
		get_currentuserinfo();

		$name = $current_user->user_firstname ? $current_user->user_firstname : '';

		?>
		<div id="simcal-drip">
			<div class="signup">
				<p>
					<label for="simcal-drip-field-first_name">
						<?php _e( 'Name', 'google-calendar-events' ); ?>
						<input type="text"
						       id="simcal-drip-field-first_name"
						       name="fields[first_name]"
						       value="<?php echo $name; ?>" />
					</label>
				</p>
				<p>
					<label for="simcal-drip-field-email">
						<?php _e( 'Email', 'google-calendar-events' ); ?>
						<input type="email"
						       id="simcal-drip-field-email"
						       name="fields[email]"
						       value="<?php echo $current_user->user_email; ?>" />
					</label>
				</p>
				<a href="#"
				   id="simcal-drip-signup"
				   class="right button button-primary"><?php _e( 'Send Me Updates', 'google-calendar-events' ); ?></a>
			</div>
			<div class="thank-you" style="display: none;">
				<?php _e( 'Thank you!', 'google-calendar-events' ); ?>
			</div>
			<div class="clear">
			</div>
		</div>
		<?php

	}

	/**
	 * Save settings.
	 *
	 * @since 3.0.0
	 *
	 * @param int      $post_id
	 * @param \WP_Post $post
	 */
	public static function save( $post_id, $post ) {
		// This meta box has no persistent settings.
	}

}
