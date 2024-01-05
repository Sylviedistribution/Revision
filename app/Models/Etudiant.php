<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['prenom','nom','sexe','classe', 'filiere', 'nationalite','dateNaissance','matricule'];//On cite toutes les colonnes
    //protected $guarded =[]; inserer toutes les valeurs sauf celles du tableau

}
