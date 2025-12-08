<?php

if (!isset($GLOBALS['TL_DCA']['tl_form_field']['palettes']['select'])) {
    \Contao\Controller::loadDataContainer('tl_form_field');
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['options'][] = 'form_event_select';

$basePalette = $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select'] ?? '{type_legend},type,name,label';

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['form_event_select']
    = str_replace(
        '{options_legend},options',
        '{event_options_legend},eventOptionsCalendar,eventOptionsDateFormat,eventOptionsTimeFormat',
        $basePalette
    );

$GLOBALS['TL_DCA']['tl_form_field']['fields']['multiple']['eval']['tl_class'] = 'w50 clr hidden';
$GLOBALS['TL_DCA']['tl_form_field']['fields']['multiple']['exclude'] = true;

$GLOBALS['TL_DCA']['tl_form_field']['fields']['eventOptionsCalendar'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['eventOptionsCalendar'],
    'exclude'   => true,
    'inputType' => 'select',
    'foreignKey'=> 'tl_calendar.title',
    'eval'      => ['mandatory' => true, 'multiple' => false, 'tl_class' => 'clr'],
    'sql'       => "int(10) unsigned NULL",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['eventOptionsDateFormat'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['eventOptionsDateFormat'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50', 'maxlength' => 64, 'placeholder' => 'd.m.Y'],
    'sql'       => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['eventOptionsTimeFormat'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['eventOptionsTimeFormat'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50', 'maxlength' => 64, 'placeholder' => 'H:i'],
    'sql'       => "varchar(64) NOT NULL default ''",
];
