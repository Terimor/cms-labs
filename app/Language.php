<?php

namespace App;

class Language {
    public const EN = 'en';
    public const RU = 'ru';

    public const DEFAULT_LANGUAGE = self::RU;

    public static function getLanguageList () {
        return [self::EN, self::RU];
    }
}
