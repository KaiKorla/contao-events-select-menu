<?php

use KaiKorla\ContaoEventFormOptions\Form\FormEventSelect;

$GLOBALS['TL_FFL']['form_event_select'] = FormEventSelect::class;
$GLOBALS['TL_HOOKS']['processFormData'][] = [
    \KaiKorla\ContaoEventFormOptions\Form\ProcessEventLabelsListener::class,
    'onProcessFormData',
];
