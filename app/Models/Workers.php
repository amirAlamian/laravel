<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function branch() {

        return $this->belongsTo('\App\Models\branch');
    }

    public function project(){

        return $this->belongsToMany('\App\Models\Project')->withTimestamps();
    }

}
