<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'name',
        'description',
        'src',
        'iva',
        'categoryID',
        'userID'

    ]; 

    protected $hidden = [
        'iva',
        'categoryID',
        'src',
    ]; 

}
