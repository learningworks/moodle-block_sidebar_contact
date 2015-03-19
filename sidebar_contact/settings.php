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
 * Settings
 *
 * @package    block
 * @subpackage sidebar_contact
 * @copyright  2015 Aaron Leggett & Thomas Threadgold - LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    global $CFG, $USER, $DB, $SITE;

    // ADD ENABLE CHECKBOX.
    $settings->add(
        new admin_setting_configcheckbox(
            'block_sidebar_contact/enable_sidebar_contact',
            get_string('enable_sidebar_contact', 'block_sidebar_contact'),
            get_string('enable_sidebar_contact_desc', 'block_sidebar_contact'),
            0
        )
    );

    // ADD NOT AUTH CHECKBOX.
    $settings->add(
        new admin_setting_configcheckbox(
            'block_sidebar_contact/unauth_sidebar_contact',
            get_string('unauth_sidebar_contact', 'block_sidebar_contact'),
            get_string('unauth_sidebar_contact_desc', 'block_sidebar_contact'),
            0
        )
    );

    // ADD ANON CHECKBOX.
    $settings->add(
        new admin_setting_configcheckbox(
            'block_sidebar_contact/anon_sidebar_contact',
            get_string('anon_sidebar_contact', 'block_sidebar_contact'),
            get_string('anon_sidebar_contact_desc', 'block_sidebar_contact'),
            0
        )
    );

    // ADD EMAIL SETTING.
    $settings->add(
        new admin_setting_configtext(
            'block_sidebar_contact/email',
            get_string('email', 'block_sidebar_contact'),
            get_string('email_desc', 'block_sidebar_contact'),
            $CFG->supportemail
        )
    );

    // ADD SUBJECT SETTING.
    $settings->add(
        new admin_setting_configtext(
            'block_sidebar_contact/subject',
            get_string('subject', 'block_sidebar_contact'),
            get_string('subject_desc', 'block_sidebar_contact'),
            get_string('subject_default', 'block_sidebar_contact').' - '.$SITE->fullname//get_config('fullname','frontpagesettings')
        )
    );


    // ADD WYSIWYG SETTING.
    $settings->add(
        new admin_setting_confightmleditor(
            'block_sidebar_contact/sidebar_content',
            get_string('sidebar_content', 'block_sidebar_contact'),
            get_string('sidebar_content_desc', 'block_sidebar_contact'),
            '<h4>Contact Us:</h4>'
        )
    );
}
