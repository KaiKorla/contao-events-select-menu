<?php

namespace KaiKorla\ContaoEventFormOptions\Form;

use Contao\Form;
use Contao\FormFieldModel;
use KaiKorla\ContaoEventFormOptions\EventOptions;

class PrepareEventLabelsListener
{
    public function onPrepareFormData(
        array &$submittedData,
        array &$labels,
        array $fields,
        Form $form
    ): void {
        foreach ($fields as $field) {
            if (!$field instanceof FormFieldModel) {
                continue;
            }

            if ($field->type !== 'form_event_select') {
                continue;
            }

            if (empty($field->eventOptionsCalendar)) {
                continue;
            }

            $fieldName = $field->name;

            if (!isset($submittedData[$fieldName])) {
                continue;
            }

            $eventId    = (string) $submittedData[$fieldName];
            $options = EventOptions::getEventOptions($field);

            if (!isset($options[$eventId])) {
                continue;
            }

			$submittedData[$fieldName] = $options[$eventId];
        }
    }
}
