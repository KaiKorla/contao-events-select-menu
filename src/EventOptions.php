<?php

namespace KaiKorla\ContaoEventFormOptions;

use Contao\Database;
use Contao\FormFieldModel;
use Contao\StringUtil;

class EventOptions
{
    public static function getEventOptions($dc): array
    {
        if (!isset($dc->id)) {
            return [];
        }

        $ff = FormFieldModel::findByPk($dc->id);

        $dateFmt = $ff->eventOptionsDateFormat ?: 'd.m.Y';
        $timeFmt = $ff->eventOptionsTimeFormat ?: 'H:i';
        $tomorrow = strtotime('tomorrow');

        $sql = "
            SELECT id, title, startTime, endTime
            FROM tl_calendar_events
            WHERE pid=?
            AND published='1'
            AND startTime >= ?
            ORDER BY startTime ASC
        ";

        $db     = Database::getInstance();
        $events = $db->prepare($sql)->execute($ff->eventOptionsCalendar,$tomorrow);

        $options = [];

        while ($events->next()) {
            $label = date($dateFmt, $events->startTime);

            if ($events->endTime) {
                $label .= ' '
                    . date($timeFmt, $events->startTime)
                    . ' - '
                    . date($timeFmt, $events->endTime);
            }

            $options[$events->id] = $events->title . ' | ' . $label;
        }

        return $options;
    }
}
