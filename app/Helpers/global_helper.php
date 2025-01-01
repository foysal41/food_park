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
