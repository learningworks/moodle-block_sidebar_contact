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
 * Main file to display the block
 *
 * @package    block_sidebar_contact
 * @copyright  2015 Aaron Leggett & Thomas Threadgold - LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_sidebar_contact extends block_base {
    public function init() {
        $this->title = get_string('sidebar_contact', 'block_sidebar_contact');
    }//closing init()

    public function has_config() {
    	return true;
    }//closing has_config()

    public function get_content() {
	    global $CFG;
	    require_once($CFG->dirroot . '/blocks/sidebar_contact/locallib.php');

	    if ($this->content !== null) {
	    	return $this->content;
	    }

	    $this->content = new stdClass();

	    $enabledForGuests = get_config('block_sidebar_contact', 'unauth_sidebar_contact');

	    if (empty($enabledForGuests)) {
        	if(isloggedin()){
        		$showForm = true;
        	}else{
        		$showForm = false;
        	}
	    }else{
	    	$showForm = true;
	    }

	    if($showForm){
	    	$this->page->requires->jquery();
    		$this->page->requires->js('/blocks/sidebar_contact/scripts/scripts.js');
	    }

	    $this->content->text = '';
	    return $this->content;

  	}//closing get_content()
}//closing class definition



