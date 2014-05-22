<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

// theme_preprocess_html
function suitcase_preprocess_html(&$vars) {
//  ISU Bar responsive classes added to body
  $vars['attributes_array']['class'][] = 'responsive';
  $vars['attributes_array']['class'][] = 'wd-show-sidebar';
}

// template_preprocess_region
function suitcase_preprocess_region(&$vars) {
  $vars['dept_url'] = variable_get('dept_url', $default = NULL);
  if($vars['elements']['#region'] == 'content' && arg(0) == 'node' && is_numeric(arg(1))) {
    $arg0 = arg(0);

    $node = node_load(arg(1));
    $tax = taxonomy_term_load($node->field_people_category[LANGUAGE_NONE][0]['tid']);
    $arg1 = arg(1);
  }
}

function suitcase_preprocess_content(&$vars) {
  $vars['categories'] = variable_get('field_people_category', $default = NULL);
}