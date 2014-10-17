<div class="tool-area<?php if (TBGContext::isProjectContext()): ?> project_context<?php endif; ?>"><div id="hierarchy-menu">
<ol id="breadcrumb-info" class="breadcrumbs">
<?php $breadcrumbs = $tbg_response->getBreadcrumbs();

foreach ($breadcrumbs as $index => $breadcrumb) {

$next_has_menu = (array_key_exists($index + 1, $breadcrumbs) && array_key_exists('subitems', $breadcrumbs[$index + 1]) && is_array($breadcrumbs[$index + 1]['subitems']));
if (array_key_exists('subitems', $breadcrumb) && is_array($breadcrumb['subitems']) && count($breadcrumb['subitems'])){
?><li class="dropdown">
  <?php $first = true; ?>
  <?php foreach ($breadcrumb['subitems'] as $subindex => $subitem){ ?>
  <?php if (array_key_exists('url', $subitem) || $subitem['title'] == $breadcrumb['title']){ ?>
  <?php if($first === false) { ?><li><?php } ?>
  <a href="<?php echo (array_key_exists('url', $subitem)) ? $subitem['url'] : '#'; ?>"<?php if (strpos($subitem['title'], $breadcrumb['title']) === 0): ?> class="selected<?php if ($first): ?> rounded_list_first_item<?php endif; ?>"<?php endif; ?>><?php echo $subitem['title']; ?></a>
  <?php if($first === false) { ?></li><?php } else { ?><ul><?php } ?>
  <?php $first = false; ?>
  <?php } /*endif*/ ?>
  <?php } /*endforeach*/ ?></ul>
</li><?php } else {  ?><li>
  <?php $class = (array_key_exists('class', $breadcrumb) && $breadcrumb['class']) ? $breadcrumb['class'] : ''; ?>
  <?php if ($breadcrumb['url']): ?>
  <?php echo link_tag($breadcrumb['url'], $breadcrumb['title']); ?>
  <?php else: ?>
  <a <?php if ($class): ?> class="<?php echo $class; ?>"<?php endif; ?>><?php echo $breadcrumb['title']; ?></a>
  <?php endif; ?>
</li><?php }

} /*endforeach*/ ?>
</ol></div></div><?php /*
	<?php if ($tbg_user->canSearchForIssues()): ?>
		<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo (TBGContext::isProjectContext()) ? make_url('search', array('project_key' => TBGContext::getCurrentProject()->getKey())) : make_url('search'); ?>" method="get" name="quicksearchform" style="float: right;">
			<div style="width: auto; padding: 0; text-align: right; position: relative;" id="quicksearch_container">
				<input type="hidden" name="filters[text][operator]" value="=">
				<?php echo image_tag('spinning_16.gif', array('id' => 'quicksearch_indicator', 'style' => 'display: none;')); ?>
				<input type="search" name="filters[text][value]" accesskey="f" id="searchfor" placeholder="<?php echo __('Search for anything here'); ?>"><div id="searchfor_autocomplete_choices" class="autocomplete rounded_box"></div>
				<input type="submit" class="button-blue" id="quicksearch_submit" value="<?php echo TBGContext::getI18n()->__('Find'); ?>">
			</div>
		</form>
	<?php endif; ?>
*/ ?>
