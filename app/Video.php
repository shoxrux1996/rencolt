<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name_ru', 'name_uz', 'name_en',
        'text_ru', 'text_uz', 'text_en','video'
    ];

    public function getTranslatedAttribute($attribute){
    	$locale = \App::getLocale();
    	$atr = $attribute."_".$locale;
    	return $this->{$atr};
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class);
    } 
}
