<?php
/**
 * Title: Query Post Grid
 * Slug: glisten/query-post-grid
 * Categories: query
 * Viewport width: 750
 */
?>
<!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true,"className":"is-style-post-grid","layout":{"type":"default"}} -->
<div class="wp-block-query is-style-post-grid"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|90"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"border":{"radius":"2.5rem","color":"#ffffff00","style":"solid","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"blockGap":"0"}},"className":"post-container is-style-gray-border","layout":{"type":"constrained"},"metadata":{"name":"Post"}} -->
<div class="wp-block-group post-container is-style-gray-border has-border-color" style="border-color:#ffffff00;border-style:solid;border-width:1px;border-radius:2.5rem;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)"><!-- wp:post-featured-image /-->

<!-- wp:group {"className":"post-content","layout":{"type":"constrained"},"metadata":{"name":"Post Content"}} -->
<div class="wp-block-group post-content"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|06"}},"layout":{"type":"constrained"},"metadata":{"name":"Metadata"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"typography":{"textDecoration":"none"}},"fontSize":"60"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|06"}},"className":"is-style-text-half-important opacity-50","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group is-style-text-half-important opacity-50"><!-- wp:post-date /-->

<!-- wp:post-terms {"term":"post_tag","className":"is-style-icon-only"} /-->

<!-- wp:post-terms {"term":"category","className":"is-style-icon-only"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"showMoreOnNewLine":false} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"className":"w-100","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group w-100" style="margin-top:var(--wp--preset--spacing--90);margin-bottom:var(--wp--preset--spacing--90)"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"2em"}},"layout":{"type":"constrained"},"metadata":{"name":"Previous"}} -->
<div class="wp-block-group"><!-- wp:query-pagination-previous /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"metadata":{"name":"Pages"}} -->
<div class="wp-block-group"><!-- wp:query-pagination-numbers /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"2rem"}},"layout":{"type":"constrained"},"metadata":{"name":"Next"}} -->
<div class="wp-block-group"><!-- wp:query-pagination-next /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center">There are no posts to display.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->