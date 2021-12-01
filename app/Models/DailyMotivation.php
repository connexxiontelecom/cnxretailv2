<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMotivation extends Model
{
    use HasFactory;



    public function getDailyRandomMotivation($period){
        return DailyMotivation::where('time', $period)->inRandomOrder()->first();
    }
}
