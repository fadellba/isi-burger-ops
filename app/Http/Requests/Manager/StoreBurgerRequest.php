<?php
/*
   Dans Laravel, les règles de validation (le contenu du tableau rules)
   permettent de valider presque n'importe quel type de donnée
  sans écrire de logique complexe.
1. Présence et Nécessité
required : Le champ est obligatoire.
nullable : Le champ peut être null.
sometimes : Ne valide le champ que s'il est présent dans la requête.
filled : Ne doit pas être vide s'il est présent.
present : Le champ doit exister dans la requête (même vide).
prohibited : Le champ ne doit pas être présent.
required_if:autre_champ,valeur : Obligatoire si l'autre champ vaut cette valeur.
required_unless:autre_champ,valeur : Obligatoire sauf si l'autre champ vaut cette valeur.
required_with:autre_champ : Obligatoire si l'autre champ est présent.
2. Types de Données
string : Chaîne de caractères.
numeric : Nombre (entier ou décimal).
integer : Nombre entier uniquement.
boolean : Valeur booléenne (true, false, 1, 0).
array : Tableau PHP.
file : Fichier uploadé.
image : Fichier de type image (jpg, png, etc.).
json : Chaîne au format JSON valide.
3. Tailles et Nombres
min:valeur : Minimum (caractères pour texte, valeur pour nombre, KB pour fichier).
max:valeur : Maximum.
between:min,max : Entre deux valeurs.
size:valeur : Taille exacte.
digits:n : Doit être numérique et avoir exactement n chiffres.
digits_between:min,max : Nombre de chiffres compris entre min et max.
4. Formats Spécifiques
email : Adresse email valide.
url : Lien URL valide.
active_url : URL avec un enregistrement DNS valide.
ip / ipv4 / ipv6 : Adresse IP.
mac_address : Adresse MAC.
uuid / ulid : Identifiants uniques.
alpha : Uniquement des lettres.
alpha_num : Lettres et chiffres.
alpha_dash : Lettres, chiffres, tirets et underscores.
regex:/motif/ : Expression régulière personnalisée.
5. Base de Données
unique:table,colonne : La valeur ne doit pas déjà exister dans la table.
exists:table,colonne : La valeur doit exister dans la table (très utilisé pour les IDs).
6. Dates
date : Date valide.
after:date : Doit être une date après la date donnée.
before:date : Doit être une date avant la date donnée.
date_format:format : Doit respecter un format précis (ex: Y-m-d).
7. Logique et Comparaisons
accepted : Doit être "yes", "on", 1 ou true (utile pour les CGU).
confirmed : Le champ doit correspondre à nom_du_champ_confirmation.
declined : Doit être "no", "off", 0 ou false.
different:autre_champ : Doit être différent d'un autre champ.
same:autre_champ : Doit être identique à un autre champ.
in:val1,val2 : Doit faire partie de la liste donnée.
not_in:val1,val2 : Ne doit pas faire partie de la liste.
Vous pouvez écrire les règles de deux façons :
Avec des barres : 'email' => 'required|email|unique:users'
Avec un tableau : 'email' => ['required', 'email', Rule::unique('users')] (Recommandé pour les règles complexes).
*/
namespace App\Http\Requests\Manager;

use App\Models\Burger;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBurgerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /*cette methode verifie si l'utilisateur a la droit de faire
    cette action*/
    public function authorize(): bool
    {
        return $this->user()->can('create', Burger::class);;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,webp,jfif|max:2048',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
