<?php
/**
 * Title: Header
 * Slug: glisten/header
 * Categories: header
 * Viewport width: 750
 */
?>
<!-- wp:group {"metadata":{"name":"Navigation"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"position-fixed top-0 w-100 z-index-top","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull position-fixed top-0 w-100 z-index-top" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Navigation"},"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0","top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--16);padding-right:0;padding-bottom:var(--wp--preset--spacing--16);padding-left:0"><!-- wp:group {"metadata":{"name":"Logo Container"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":50,"shouldSyncIcon":true} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Menu Container"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:glisten/menu-button /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Container"},"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}},"color":{"background":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dcolor\u002d\u002dbase-50)"}},"className":"position-fixed top-0 start-0 end-0 bottom-0 z-index-4 has-normal-background-blur is-command-palette-container overflow-y-auto","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide position-fixed top-0 start-0 end-0 bottom-0 z-index-4 has-normal-background-blur is-command-palette-container overflow-y-auto has-background" style="background-color:var(--wp--custom--color--base-50);margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)"><!-- wp:group {"align":"wide","style":{"layout":{"selfStretch":"fit","flexSize":null}},"className":"w-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide w-100"><!-- wp:group {"metadata":{"name":"Command Palette"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"1rem"},"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dcolor\u002d\u002daccent-dark-80)"}},"className":"has-small-background-blur","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-small-background-blur has-background" style="border-radius:1rem;background-color:var(--wp--custom--color--accent-dark-80);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33%"><!-- wp:navigation {"openSubmenusOnClick":true,"overlayMenu":"never","icon":"menu","overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"vertical"},"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"60"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:template-part {"slug":"part-command-palette-actions","theme":"glisten","area":"uncategorized"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->