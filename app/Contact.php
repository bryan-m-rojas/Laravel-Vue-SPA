<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    
    protected $dates = ["birthday"];
    
    public function path()
    {
        return '/contacts/' . $this->id;        
    }
    
    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birthday like "%-' . now()->format('m') . '-%"');
    }
    
    public function setBirthdayAttributes($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
