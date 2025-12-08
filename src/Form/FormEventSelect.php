<?php

namespace KaiKorla\ContaoEventFormOptions\Form;

use Contao\FormSelect;
use KaiKorla\ContaoEventFormOptions\EventOptions;

class FormEventSelect extends FormSelect
{
    protected function getOptions(): array
    {
        $raw = EventOptions::getEventOptions((object) ['id' => $this->id]);

        $arr = [];

        foreach ($raw as $value => $label) {
            $arr[] = [
                'type'     => 'option',
                'value'    => (string) $value,
                'label'    => $label,
                'selected' => '',
            ];
        }

        return $arr;
    }
}
