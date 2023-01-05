<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domaine extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'intitule',
        'status',
        'description',
        'image'
    ];

    public function works(){
        return $this->hasMany(work::class,'domaines_id','id');

    }

}
