<?php

/* Create Unique Slug */

if(!function_exists('create_unique_slug')){
    function create_unique_slug($model, $name) : string

    {
        $modelClass = "App\\Models\\$model";


        if(!class_exists($modelClass))
        {
            throw new \InvalidArgumentException("Class $model does not exist");
        }

        $slug = \Str::slug($name);
        $count = 2;

        while($modelClass::where('slug' , $slug)->exists())
        {
            $slug = \Str::slug($name) .  '-' . $count;
            $count++;
        }

        return $slug;
    }
}

if(!function_exists('currencyPosition')) {

    function currencyPosition($price) : string {
        if(config('settings.currency_position') == 'left')  {
            return config('settings.site_currency_icon') . $price;
     }else{
        return $price . config('settings.site_currency_icon');
     }
    }
}

