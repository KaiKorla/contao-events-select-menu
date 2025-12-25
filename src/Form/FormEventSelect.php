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

    public function validate(): void
    {
        $raw = EventOptions::getEventOptions((object) ['id' => $this->id]);

        $this->options = [];

        foreach ($raw as $value => $label) {
            $this->options[(string) $value] = (string) $label;
        }

        parent::validate();
    }
}
