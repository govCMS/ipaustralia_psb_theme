<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  govcms_psb_preprocess_html($variables, $hook);
  govcms_psb_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  // $variables['classes_array'] =
  //  array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function govcms_psb_preprocess_node(&$variables, $hook) {
  // Optionally, run node-type-specific preprocess functions, like
  // govcms_psb_preprocess_node_page() or
  // govcms_psb_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}

/**
 * Implements hook_preprocess_node_form.
 */
function govcms_psb_preprocess_node_form(&$variables) {
  if ($variables['view_mode'] === 'teaser'){
    // Remove View more link.
    unset($variables['content']['links']['node']['#links']['node-readmore']);
  }
}

/**
 * Implements hook_preprocess_node_form.
 */
function govcms_psb_preprocess_node_attorney(&$variables) {
  // Replaceing the title with the Last name then First name.

  $first_name = $variables['field_first_name'][0]['safe_value'];
  $last_name = $variables['field_last_name'][0]['safe_value'];

  $variables['title'] = $last_name . ', ' . $first_name;
}



/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] =
  // array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function govcms_psb_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];
}
// */


/**
 * Implements hook_preprocess_file_entity
 */
function govcms_psb_preprocess_file_entity(&$variables) {
  $view_mode = $variables['view_mode'];
  $file = &$variables['content']['file']['#file'];

  // We add a render element 'file_size' that we print in the
  // file--document--teaser.tpl.php template file.
  if ($view_mode === 'teaser' && isset($file->filesize)) {
    $variables['content']['file_size'] = array(
      '#markup' => format_size($file->filesize),
    );
  }
}
