<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categorie extends Model
{
//si la table n'a pas de "s" à la fin ou n'est pas le meme nom
protected $table = "categorie";
// si vous n'avez pas de created_at et updated_at champs.
public $timestamp = false;
use HasFactory;
static public function selectCategorie(){
$lg=null;
if(session()->has('locale') && session()->get('locale') == 'fr'){
$lg = "_fr";
}
$query = Categorie::Select('id',
DB::raw('(case when categorie'.$lg.' is null then categorie else categorie'.$lg.' end) as categorie'))
->OrderBy('categorie')
->get();
return $query;
}
}