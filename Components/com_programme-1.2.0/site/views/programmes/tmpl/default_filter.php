<?php

defined('JPATH_BASE') or die;

$data = $displayData;

// Receive overridable options
$data['options'] = !empty($data['options']) ? $data['options'] : array();

// Set some basic options
$customOptions = array(
    'filtersHidden' => isset($data['options']['filtersHidden']) ? $data['options']['filtersHidden'] : empty($data['view']->activeFilters),
    'defaultLimit' => isset($data['options']['defaultLimit']) ? $data['options']['defaultLimit'] : JFactory::getApplication()->get('list_limit', 20),
    'searchFieldSelector' => '#filter_search',
    'orderFieldSelector' => '#list_fullordering'
);

$data['options'] = array_unique(array_merge($customOptions, $data['options']));

$formSelector = !empty($data['options']['formSelector']) ? $data['options']['formSelector'] : '#adminForm';
$filters = false;
if (isset($data['view']->filterForm)) {
    $filters = $data['view']->filterForm->getGroup('filter');
}

// Load search tools
JHtml::_('searchtools.form', $formSelector, $data['options']);
?>

<div class="js-stools clearfix">
    <div class="clearfix">
        <div class="js-stools-container-bar">

            <label for="filter_search" class="element-invisible" aria-invalid="false"><?php echo JText::_('COM_PROGRAMME_SEARCH_FILTER_SUBMIT'); ?></label>

            <div class="btn-wrapper input-append">
                <input type="text" name="filter[search]" id="filter_search" value="" class="js-stools-search-string"
                       placeholder="<?php echo JText::_('COM_PROGRAMME_SEARCH_FILTER_SUBMIT'); ?>">
                <button type="submit" class="btn hasTooltip" title="" data-original-title="<?php echo JText::_('COM_PROGRAMME_SEARCH_FILTER_SUBMIT'); ?>">
                    <i class="icon-search"></i>
                </button>
            </div>
            <?php if ($filters) : ?>
            <div class="btn-wrapper hidden-phone">
                <button type="button" class="btn hasTooltip js-stools-btn-filter" title=""
                        data-original-title="<?php echo JText::_('COM_PROGRAMME_SEARCH_TOOLS_DESC'); ?>">
                    <?php echo JText::_('COM_PROGRAMME_SEARCH_TOOLS'); ?> <i class="caret"></i>
                </button>
            </div>
            <?php endif; ?>
            <div class="btn-wrapper">
                <button type="button" class="btn hasTooltip js-stools-btn-clear" title="" data-original-title="<?php echo JText::_('COM_PROGRAMME_SEARCH_FILTER_CLEAR'); ?>">
                    <?php echo JText::_('COM_PROGRAMME_SEARCH_FILTER_CLEAR'); ?>
                </button>
            </div>
        </div>
    </div>
    <!-- Filters div -->
    <div class="js-stools-container-filters hidden-phone clearfix" style="">
        <?php // Load the form filters ?>
        <?php if ($filters) : ?>
            <?php foreach ($filters as $fieldName => $field) : ?>
                <?php if ($fieldName != 'filter_search') : ?>
                    <div class="js-stools-field-filter">
                        <?php echo $field->input; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>