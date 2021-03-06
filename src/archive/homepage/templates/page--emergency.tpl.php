<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions: This needs to be redone ~ephraim
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
drupal_add_css(path_to_theme() . '/css/emergency.css', array('group' => CSS_THEME, 'every_page' => FALSE));
?>

<!--emergency template -->
<div id="Wrapper">
  <div id="container">
    <header id="main-header">
      <div id="header">
        <div style="background:url('<?php print $base_path . $directory; ?>/img/topbg.gif') repeat-x left top;height:24px;"></div>
        <div style="width:1004px;height:153px;"><img src="<?php print $base_path . $directory; ?>/img/emergency_logo.jpg" width="1004px" alt="BYU Official Campus Alert" /></div>
        <div style="background:url('<?php print $base_path . $directory; ?>/img/topbg.gif') repeat-x left top;height:24px;"></div>
      </div>
    </header>
    <div id="content" class="wrapper" role="main">

    <?php if ($tabs = render($tabs)): ?>
      <div class="tabs"><?php print $tabs; ?></div>
    <?php endif; ?>

    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>

      <?php print $messages; ?>
      <?php print render($page['content']); ?>
      <!-- /.section, /#content -->
    </div>
    <footer>
      <div id="footer">
        <?php if ($page['footer-column1'] || $page['footer-column2'] || $page['footer-column3'] || $page['footer-column4'] || $page['footer-column5']): ?>
          <div id="footer-links">
            <div class="wrapper"> 	
              <?php if ($page['footer-column1']): ?>
                <div class="col">
                  <?php print render($page['footer-column1']); ?>
                </div>
              <?php endif; ?>

              <?php if ($page['footer-column2']): ?>
                <div class="col">
                  <?php print render($page['footer-column2']); ?>
                </div>
              <?php endif; ?>

              <?php if ($page['footer-column3']): ?>
                <div class="col double">
                  <?php print render($page['footer-column3']); ?>
                </div>
              <?php endif; ?>

              <?php if ($page['footer-column4']): ?>
                <div class="col">
                  <?php print render($page['footer-column4']); ?>
                </div>
              <?php endif; ?>

              <?php if ($page['footer-column5']): ?>
                <div class="col omega">
                  <?php print render($page['footer-column5']); ?>
                </div>
              <?php endif; ?>

            </div>	
          </div>
        <?php endif; ?>

        <div id="footer-bottom">
          <div class="wrapper">
            <?php print render($page['footer-bottom']); ?>
          </div>
        </div>
      </div>
    </footer>
  </div><!-- /#container -->
</div><!-- /.Wrapper -->
