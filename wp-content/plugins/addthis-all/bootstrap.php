<?php
/*
 * +--------------------------------------------------------------------------+
 * | Copyright (c) 2008-2019 Add This, LLC                                    |
 * +--------------------------------------------------------------------------+
 * | This program is free software; you can redistribute it and/or modify     |
 * | it under the terms of the GNU General Public License as published by     |
 * | the Free Software Foundation; either version 2 of the License, or        |
 * | (at your option) any later version.                                      |
 * |                                                                          |
 * | This program is distributed in the hope that it will be useful,          |
 * | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
 * | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
 * | GNU General Public License for more details.                             |
 * |                                                                          |
 * | You should have received a copy of the GNU General Public License        |
 * | along with this program; if not, write to the Free Software              |
 * | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA |
 * +--------------------------------------------------------------------------+
 */

/**
 * Author URI:  http://www.addthis.com
 * Author:      The AddThis Team
 * Domain Path: /frontend/build/l10n
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * License:     GNU General Public License v2
 * Plugin Name: Website Tools by AddThis
 * Plugin URI:  https://wordpress.org/plugins/addthis-all/
 * Text Domain: addthis-backend
 * Version:     3.2.6
 * Description: Easily link your WordPress site to access all AddThis tools, and control and edit easily through the AddThis dashboard.
 */

require_once 'backend/functions.php';
require_once 'backend/AddThisMinimumPlugin.php';

$baseName = plugin_basename(__FILE__);
$addThisMinimumPlugin = new AddThisMinimumPlugin($baseName);
$addThisMinimumPlugin->bootstrap();
