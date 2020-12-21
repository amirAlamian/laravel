<?php

namespace App\Models;

use App\Scopes\TestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'company_id'];


    public function company (){
        return $this->belongsTo("\App\Models\Company");
    }

        
    public function workers() {

        return $this->hasMany('\App\Models\Workers');
    }
    
    public function scopeMostWorkers (Builder $query){
        return $query->withCount('workers')->orderBy('workers_count', 'desc');
    }

    public static function boot (){
        parent::boot();

        static::addGlobalScope(new TestScope);

    }
}
