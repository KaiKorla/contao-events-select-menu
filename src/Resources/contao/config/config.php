<?php

use KaiKorla\ContaoEventFormOptions\Form\FormEventSelect;

$GLOBALS['TL_FFL']['form_event_select'] = FormEventSelect::class;
$GLOBALS['TL_HOOKS']['prepareFormData'][] = [
    \KaiKorla\ContaoEventFormOptions\Form\PrepareEventLabelsListener::class,
    'onPrepareFormData',
];
