<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuySell extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'transactionAmount',
    ]; 

    protected $hidden = [
        'transactionType',
        
    ];
    protected $casts = [
        'transactionDate' => 'datetime',
    ];
}
