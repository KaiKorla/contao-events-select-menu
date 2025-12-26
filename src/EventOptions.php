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

            if (
                ($fieldConfig['type'] ?? null) !== 'event_select'
                || empty($fieldConfig['event_calendar'])
            ) {
                continue;
            }

            if (!isset($submittedData[$fieldName])) {
                continue;
            }

            $eventId = (string) $submittedData[$fieldName];
            $calendarId = (int) $fieldConfig['event_calendar'];

            $options = EventOptions::getEventOptions((object) ['id' => $calendarId]);

            if (!isset($options[$eventId])) {
                continue;
            }

            $submittedData[$fieldName . '_label'] = $options[$eventId];
        }
    }
}
