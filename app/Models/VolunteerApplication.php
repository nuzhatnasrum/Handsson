<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;

    protected $table = 'volunteer_applications';  // Make sure this matches your table name

   
    protected $fillable = ['name', 'email', 'skills', 'status', 'cv'];

    // If you need relationships, you can define them here
    // Example: public function volunteer() { return $this->belongsTo(Volunteer::class); }
}
