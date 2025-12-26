<?php

namespace KaiKorla\ContaoEventFormOptions\Form;

use Contao\FormSelect;
use KaiKorla\ContaoEventFormOptions\EventOptions;

class FormEventSelect extends FormSelect
{

    public function __construct($arrAttributes=null)
    {
        parent::__construct($arrAttributes);

        $raw = EventOptions::getEventOptions((object) ['id' => $this->id]);
        foreach ($raw as $value => $label) {
            $this->arrOptions[] = array('value' => $value, 'label' => $label);
        }
    }
}
