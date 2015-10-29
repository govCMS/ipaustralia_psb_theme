<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<header class="header" id="header" role="banner">
  <div class="header__inner">

    <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Australian Government - Professional Standards Board for Patent and Trade Marks Attorneys'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>
  <?php print render($page['header']); ?>
  </div>
</header>

<?php print render($page['navigation']); ?>

<div id="page">

  <?php print render($page['highlighted']); ?>

  <?php print $breadcrumb; ?>

  <?php if (!($is_front)): ?>
    <div class="action-buttons">
      <div class="listen-page-wrapper">
        Listen to this page
      </div>
      <div class="print-page-wrapper">
        <a class="print-page">Print this page</a>
      </div>
    </div>
  <?php endif; ?>


  <div id="main">

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
    ?>

    <?php if ($sidebar_first): ?>
      <aside class="sidebars" role="complementary">
        <?php print $sidebar_first; ?>
      </aside>
    <?php endif; ?>

    <div id="content" class="column" role="main">

      <a href="#skip-link" id="skip-content" class="element-invisible">Go to top of page</a>

      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
      <?php if (!($is_front)): ?>
      <a href="#" id="skip-content-top" class="return-top">Go to top of page</a>
      <?php endif; ?>
    </div>

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_second): ?>
      <aside class="sidebars" role="complementary">
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>

</div>

<?php print render($page['footer']); ?>

<?php print render($page['bottom']); ?>
