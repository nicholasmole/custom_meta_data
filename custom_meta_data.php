<?php
/**
 * Plugin Name: Custom Meta Data
 * Description: Create custom meta data from the excerpt or content
 * Version: 0.1.0
 * Author: Nick Mole
 * Text Domain: cmd-Custom-Meta-Data
 */

require_once plugin_dir_path(__FILE__) . 'src/CustomMetaData.php';

use NM\CMD;
use NM\CMD\CustomMetaData;

new CustomMetaData();