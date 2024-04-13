<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>
<div <?= get_block_wrapper_attributes() ?>>
	<label>
		<input type="checkbox"/>
		<span aria-hidden="false" class='menu-label'>Show Menu</span>
		<div aria-hidden="true" class="menu-icon">
			<div class="menu-icon--bar bar-1"></div>
			<div class="menu-icon--bar bar-2"></div>
			<div class="menu-icon--bar bar-3"></div>
		</div>
	</label>
</div>
