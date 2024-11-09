<?php

namespace App\Services;

use App\Models\Preferences;

class UserPreferencesService
{
    public static function getUserPreferences(String $userId)
    {
        return Preferences::firstOrCreate(
            ['user_id' => $userId],
        );     
    }
}