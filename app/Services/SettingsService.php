<?php

namespace App\Services;

use App\Models\Setting;
use Cache;

class SettingsService {
    function getSetting() {
        return Cache::rememberForever('settings', function(){
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSetting(){
        $settings = $this->getSetting();
        config()->set('settings', $settings);
    }


    function clearCachedSettings(){
        Cache::forget('settings');
    }
}
