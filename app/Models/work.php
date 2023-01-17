<?php

namespace App\Models;

use Database\Factories\WorkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class work extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new WorkFactory();
    }          

    public function domaine(){

            return $this->belongsTo(Domaine::class,"domaines_id",'id');
    }

    protected $fillable = [
        "sujet",
        "categorie",
        "faculte",
        "etudiant",
        "annnee_etude",
        "nbr_pages",
        "path_document",
        "status",
        "viewCounter",
        "domaines_id",
        "etudiants_id"
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('sujet', 'like', $term);
            $query->orWhere('etudiant', 'like', $term);
            $query->orWhere('categorie', 'like', $term);
        });
    }
   
}
