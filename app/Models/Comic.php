<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    //array fillable per mass assignment
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'thumb',
    //     'price',
    //     'series',
    //     'sale_date',
    //     'type',
    //     'artists',
    //     'writers'
    // ];
}
