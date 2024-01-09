<?php

namespace App\Constants;

class VaccineStatus{
    public const NOT_VACCINATED = 'not vaccinated';
    public const SCHEDULED = 'scheduled';
    public const VACCINATED = 'vaccinated';

    public static function vaccineStatusList()
    {
        return [
            self::NOT_VACCINATED => 'Not Vaccinated',
            self::SCHEDULED => 'Scheduled',
            self::VACCINATED => 'Vaccinated',
        ];
    }
}
