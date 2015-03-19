<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle Plugin
 *
 * Content file
 *
 * @package    block
 * @subpackage sidebar_contact
 * @copyright  2015 Aaron Leggett, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/locallib.php');

global $CFG;

?>
<div class="block__sidebar-contact--toggle"><?php echo get_string('sidebar_toggle_text', 'block_sidebar_contact'); ?></div>
<div class="block__sidebar-contact">
	<div class="toggle">X</div>
	<div class="wrapper">
		<div class="content">
			<?php echo get_config('block_sidebar_contact', 'sidebar_content'); ?>
		</div>
		<form action="" class="form">
			<input type="hidden" value="<?php
                echo new moodle_url($CFG->wwwroot.'/block/sidebar_contact/sendmail.php');
            ?>" class="form__url">
			<input type="text" class="form__input form__name" name="block__sidebar-contact__name" placeholder="<?php
                echo get_string('form_label_name', 'block_sidebar_contact');
            ?>">
			<input type="text" class="form__input form__email" name="block__sidebar-contact__email" placeholder="<?php
                echo get_string('form_label_email', 'block_sidebar_contact');
            ?>">
			<textarea class="form__input form__message" name="block__sidebar-contact__message" placeholder="<?php
                echo get_string('form_label_message', 'block_sidebar_contact');
            ?>"></textarea>
			<?php
				if(block_sidebar_contact_enable_anon()){
					echo '
						<div class="form__wrapper">
							<input name="block__sidebar-contact__anon" type="checkbox" class="form__anon">
							<label for="block__sidebar-contact__anon">'.get_string('submit_anon_message', 'block_sidebar_contact').'</label>
						</div>
					';
				}
			?>
			<input type="submit" class="form__submit" value="<?php
                echo get_string('form_button_text', 'block_sidebar_contact');
            ?>">
			<div class="form__feedback__wrapper">
				<div class="form__feedback form__feedback--success">&#10004; <?php
                    echo get_string('form_message_success', 'block_sidebar_contact');
                ?></div>
				<div class="form__feedback form__feedback--error">&#x2716; <?php
                    echo get_string('form_message_fail', 'block_sidebar_contact');
                ?></div>
			</div>
		</form>
	</div>
</div>