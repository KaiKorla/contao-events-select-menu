<?php

namespace KaiKorla\ContaoEventFormOptions\Form;

use KaiKorla\ContaoEventFormOptions\EventOptions;

class ProcessEventLabelsListener
{
    public function onProcessFormData(
        array &$submittedData,
        array $formData,
        array $submittedFields
    ): void {
        foreach ($submittedFields as $fieldName => $fieldConfig) {

            if (($fieldConfig['type'] ?? null) !== 'form_event_select') {
                continue;
            }

            if (empty($fieldConfig['eventOptionsCalendar'])) {
                continue;
            }

            if (!isset($submittedData[$fieldName])) {
                continue;
            }

            $calendarId = (int) $fieldConfig['eventOptionsCalendar'];
            $eventId    = (string) $submittedData[$fieldName];

            $options = EventOptions::getEventOptions((object) ['id' => $calendarId]);

            if (!isset($options[$eventId])) {
                continue;
            }

            $submittedData[$fieldName . '_label'] = $options[$eventId];
        }
    }
}
