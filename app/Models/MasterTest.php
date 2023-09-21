<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTest extends Model
{
    use HasFactory;
    protected $table = 'master_test';
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
}
