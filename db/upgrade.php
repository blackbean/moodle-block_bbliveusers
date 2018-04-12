<?php
/**
 * This file is part of BlackBean LiveUsers <https://github.com/blackbean/BBLiveUsers>, a plugin
 * for the Moodle LMS Platform <https://www.moodle.org> that monitors the exact number of online
 * users per course in realtime, even if they spend hours watching a single video, for example,
 * without ever refreshing a single page. Copyright (C) 2018 by BlackBean Technologies Ltda.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version
 * 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU
 * General Public License along with this program.
 * If not, see https://www.gnu.org/licenses/
 */

/**
 * @package block_bbliveusers
 * @author Bruno Magalhães <brunomagalhaes@blackbean.com.br>
 * @copyright BlackBean Technologies Ltda <https://www.blackbean.com.br>
 * @license http://www.gnu.org/copyleft/gpl.html
 */
defined('MOODLE_INTERNAL') || exit(0);

/**
 * @param integer $oldversion
 * @return boolean
 */
function xmldb_block_bbliveusers_upgrade($oldversion)
{
	/**
	 *
	 */
	return(true);
}