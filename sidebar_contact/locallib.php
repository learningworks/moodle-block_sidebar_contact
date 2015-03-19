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
 * Lib File
 *
 * @package    block_sidebar_contact
 * @copyright  2015 Aaron Leggett - LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $COURSE, $USER, $DB, $CFG, $PAGE;

function block_sidebar_contact_init() {
    global $CFG, $PAGE;

    // IF THE PLUGIN IS ENABLED.
    if ( block_sidebar_contact_enable_sidebar_contact() ) {

        // ADD JAVASCRIPT.
        $PAGE->requires->jquery();
        $PAGE->requires->js( new moodle_url($CFG->wwwroot . '/block/sidebar_contact/js/scripts.js') );
    }
}

function block_sidebar_contact_enable_sidebar_contact() {
    $enabled = get_config('block_sidebar_contact', 'enable_sidebar_contact');
    if (empty($enabled)) {
        return false;
    } else {
        return true;
    }
}

function block_sidebar_contact_enable_anon(){
    $enabled = get_config('block_sidebar_contact', 'anon_sidebar_contact');
    if (empty($enabled)) {
        return false;
    } else {
        return true;
    }
}