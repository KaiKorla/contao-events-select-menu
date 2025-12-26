<?php

namespace KaiKorla\ContaoEventFormOptions\Form;

use Contao\Form;
use KaiKorla\ContaoEventFormOptions\EventOptions;

class ProcessEventLabelsListener
{
    public function onProcessFormData(array &$submittedData, array $formData, Form $form): void
    {
        if (!isset($submittedData['event_id'])) {
            return;
        }
        $eventId = (string) $submittedData['event_id'];

        $options = EventOptions::getEventOptions((object) ['id' => null]);

        if (!isset($options[$eventId])) {
            return;
        }

        $submittedData['event_label'] = $options[$eventId];
    }
}
