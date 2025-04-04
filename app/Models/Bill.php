<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Bill extends Model
{
     use HasFactory, Notifiable;

    protected $table = 'bills';
    protected $fillable = ['customerId', 'month', 'year', 'initial', 'final', 'units', 'amount', 'status'];
}
