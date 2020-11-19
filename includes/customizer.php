<?php
/*
================================================================================================
Azul Silver - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Azul Silver WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Customize Register (Setup)
 2.0 - Customize Register (Validation)
 3.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Register (Setup)
================================================================================================
*/
function azul_silver_customize_register_setup($wp_customize) {
    // Enable and disable Display Site Title and Tagline for Azul Silver.
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'azul_silver_customize_register_setup');

/*
================================================================================================
 2.0 - Customize Register (Validation)
================================================================================================
*/

/*
================================================================================================
 3.0 - Customize Register (Preview)
================================================================================================
*/