<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    use HasFactory;


    protected $fillable = [
        "sport",
        "description",
        "email",
        "user_id",
        "name",
        "yearsofexperience",
        "image",
        "location",
        "price",
        "rating"
                                        	

    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

 
}
