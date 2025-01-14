<?php

namespace App\Enums;

enum FormatMedia: string {
    case IMAGE = 'image';
    case SON = 'son';
    case VIDEO = 'video';

    public static function toArray(): array {
        return [
            self::IMAGE,
            self::SON,
            self::VIDEO,
        ];
    }
    public static function toValuesArray(): array {
        return array_map(fn($value) => $value->value, self::toArray());
    }
}
