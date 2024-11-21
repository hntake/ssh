<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dompdf Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for setting options for Dompdf. You can configure the
    | available options by setting the appropriate values below.
    |
    */

    'show_warnings' => false, // Set to true to show warnings
    'dpi' => 96, // Default DPI setting
    'paper' => 'letter', // Paper size (default: letter)
    'font_cache' => storage_path('fonts'), // Cache location for fonts
    'temp_dir' => storage_path('app'), // Temporary directory
    'chroot' => realpath(base_path()), // Root path to prevent file inclusion attacks

    // Enabling HTML5 Parser
    'isHtml5ParserEnabled' => true,

    // Enabling or disabling the default backend (GD or Imagick)
    'defaultBackend' => 'GD', // Use 'GD' to avoid Imagick dependency

    // List of enabled/disabled extensions
    'enabled_extensions' => [
        'ext-gd' => true, // Enable GD extension
        'ext-mbstring' => true, // Enable Mbstring extension
        'ext-zlib' => true, // Enable Zlib extension
        'ext-imagick' => false, // Disable Imagick if not needed
    ],
];