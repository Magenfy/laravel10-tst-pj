<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
    ];

    public static $rules = [
        'name' => 'required|unique:categories,name',
        'slug' => 'required',
    ];

}
