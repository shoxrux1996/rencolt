<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_ru', 'name_uz', 'name_en',
        'title_ru', 'title_uz', 'title_en',
        'text_ru', 'text_uz', 'text_en',
    ];

    public function getTranslatedAttribute($attribute){
    	$locale = \App::getLocale();
    	$atr = $attribute."_".$locale;
    	return $this->{$atr};
    }
	
	public function image_crop($image){
        $ext = explode('.', $image);
        $extension = '.' . $ext[count($ext) - 1];
        $path = str_replace($extension, '', $image);

        $thumb_name = "small";
        return $path . '-' . $thumb_name . $extension;
    }    
}
