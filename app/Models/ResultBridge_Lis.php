<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultBridge_Lis extends Model
{
    use HasFactory;
    protected $connection = 'briding';
    protected $table = 'result_bridge_lis';
}
