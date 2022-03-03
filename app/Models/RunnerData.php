<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunnerData extends Model
{
    use HasFactory;
    protected $fillable = ['runner_name','radius','start_date','end_date','number_of_laps'];

}
