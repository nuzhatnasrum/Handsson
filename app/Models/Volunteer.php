<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    // Add table name if it's not the plural form of the model name
    protected $table = 'volunteers'; // Ensure this matches the actual table name in your database
}
