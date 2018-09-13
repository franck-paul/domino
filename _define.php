<?php
/**
 * @brief domino, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (carnet.franck.paul@gmail.com)
 * @copyright GPL-2.0
 */

if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    "Domino",                                                // Name
    "Deviation Cafe-Creme, Structure Aorakit-1B de Kozlika", // Description
    "Franck Paul",                                           // Author
    '1.7',                                                   // Version
    [
        'requires' => [['core', '2.13']], // Dependencies
        'type'     => 'theme'            // Type
    ]
);
