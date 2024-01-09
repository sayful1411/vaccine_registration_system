<?php

namespace App\Constants;

class VaccineStatus{
    public const NOT_VACCINATED = 'Not Vaccinated';
    public const SCHEDULED = 'Scheduled';
    public const VACCINATED = 'Vaccinated';

    public static function vaccineStatusList()
    {
        return [
            self::NOT_VACCINATED => 'Not Vaccinated',
            self::SCHEDULED => 'Scheduled',
            self::VACCINATED => 'Vaccinated',
        ];
    }
}
