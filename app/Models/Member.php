<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'surname',
        'date_of_birth',
        'profile_picture'
    ];
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // Calculate age automatically
    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->title . ' ' . $this->name . ' ' . $this->surname;
    }
}
