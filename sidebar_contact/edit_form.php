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
 * Instance Settings
 *
 * @package    block_sidebar_contact
 * @copyright  2015 Aaron Leggett - LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
class block_sidebar_contact_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
        global $CFG;

        /*
        *
        * Intance settings that could be implemented in the future.
        * To use these you will have to uncomment the admin setting in settings.php
        *
        */

        // $forceDefaults = get_config('sidebar_contact', 'forceDefaults');
        // if($forceDefaults == 1){

        // }else{        
        //     require_once($CFG->dirroot . '/blocks/sidebar_contact/locallib.php');

        //     $mform->addElement('header', 'configheader', get_string('sidebar_contact', 'block_sidebar_contact'));

        //     $mform->addElement('text', 'instance_title', get_string('instance_title', 'block_sidebar_contact'));
    	   //  $mform->setDefault('instance_title', get_string('sidebar_contact', 'block_sidebar_contact'));
    	   //  $mform->setType('instance_title', PARAM_MULTILANG);

        //     $mform->addElement('text', 'instance_completionpercentage', get_string('completionpercentage', 'block_sidebar_contact'));
        //     $mform->setDefault('instance_completionpercentage', get_config('sidebar_contact', 'completionpercentage'));
        //     $mform->setType('instance_completionpercentage', PARAM_MULTILANG);
        //     $mform->addHelpButton('instance_completionpercentage', 'completionpercentage', 'block_sidebar_contact');

        //     $mform->addElement('advcheckbox', 'instance_activecountdown', get_string('activecountdown', 'block_sidebar_contact'), get_string('activecountdown_help', 'block_sidebar_contact'));
        //     $mform->setDefault('instance_activecountdown', get_config('sidebar_contact', 'activecountdown'));

        //     $select = $mform->addElement('select', 'instance_viewoptions', get_string('viewoptions', 'block_sidebar_contact'), getPossibleUnits());
        //     $select->setMultiple(true);
        //     $select->setSelected(get_config('sidebar_contact', 'viewoptions'));

        // }   
    }
}