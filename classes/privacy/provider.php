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
 * @package block_bbliveusers
 * @author Bruno Magalhães <brunomagalhaes@blackbean.com.br>
 * @copyright BlackBean Technologies Ltda <https://www.blackbean.com.br>
 * @license http://www.gnu.org/copyleft/gpl.html
 */
namespace block_bbliveusers\privacy;
defined('MOODLE_INTERNAL') || exit(0);

/**
 * This class defines this plug-in privacy characteristics.
 */
class provider implements \core_privacy\local\metadata\null_provider {
    /**
     * Return the language string explaining
     * why this plug-in stores no data at all.
     *
     * @return  string
     */
    public static function get_reason() {
        return('privacy:metadata');
    }
}