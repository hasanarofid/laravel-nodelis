<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $table = 'master';
    public function masterTest()
    {
        return $this->belongsTo(MasterTest::class, 'master_test_id', 'id');
    }
}
