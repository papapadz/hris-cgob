<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPCRPeriod extends Model
{
    use HasFactory;
    protected $table = 'ipcr_periods';
    protected $fillable = ['year','type','period'];
}
