<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandbecoach extends Model
{
    use HasFactory;

    protected $fillable = [
        
        "sport",
        "name",
        "email",
        "description",
        "image",
        "location",
        "price",
        "yearsofexperience",
        "coach_id",
        "status",
                                      	

    ];

    public function user(){
        return $this->belongsTo(User::class, 'coach_id');
    }

   
}
