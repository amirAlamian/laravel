<?php

namespace App\Models;

use App\Scopes\TestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','value','address'];

    public function Branch (){
        return $this->hasOne('App\Models\branch');
    }

    public function scopeTest(Builder $query) {
        return $query->orderBy(static::CREATED_AT , "desc");
    }

    public function scopeMostBranch (Builder $query){
        return $query->withCount('branch')->orderBy('branch_count', 'desc');
    }

    public static function boot (){
        parent::boot();

        static::deleting(function (Company $company ){ // deleting relations between two tables
            $company->Branch()->delete();
        });
        
        // static::addGlobalScope(new TestScope); //global scope 
    }
}
