<?php

namespace App\Http\Controllers;

use App\Models\works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class workscontroller extends Controller
{
    public function index()
    {
        if (auth()) {
            $user = Auth::user();
            $ads = works::latest()->get()->where('user_id', $user->id);
        }

        return view("index", ['ads' => $ads]);
    }
    public function create()
    {
        // On retourne la vue 
        return view("edit");
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        // 1. La validation
        $validation = $request->validate([
            'title' => 'bail|required|string|max:100',
            'categorie' => 'bail|required|string|max:100',
            'description' => 'bail|required|string|max:255',
            'prix' => 'bail|required',
            'emplacement' => 'bail|required|string|max:255',
            'picture' => 'bail|required|image|max:1024',

        ]);

        // 2. On upload l'image dans "/storage/app/public/Ads"
        $chemin_image = $request->picture->store("Ads");

        // 3. On enregistre les informations du Post
        works::create([
            "title" => $request->title,
            "categorie" => $request->categorie,
            "description" => $request->description,
            "prix" => $request->prix,
            "emplacement" => $request->emplacement,
            "picture" => $chemin_image,
            'user_id' => $user['id']
        ]);
        return redirect(route("index"));
    }
    public function edit($ad)
    {
        $ad = works::find($ad);
        return view("modifier", ['ad' => $ad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ad)
    {
        $ad = works::find($ad);
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'title' => 'bail|required|string|max:255',
            'categorie' => 'bail|required|string|max:100',
            'description' => 'bail|required|string|max:255',
            'prix' => 'bail|required',
            'emplacement' => 'bail|required|string|max:255',
            'picture' => 'bail|required|image|max:1024',

        ];

        // Si une nouvelle image est envoyée
        if ($request->has("picture")) {
            // On ajoute la règle de validation pour "picture"
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if ($request->has("picture")) {

            //On supprime l'ancienne image
            storage::delete($ad->picture);

            $chemin_image = $request->picture->store("ad");
        }

        // 3. On met à jour les informations du annonce
        $ad->update([
            "title" => $request->title,
            "categorie" => $request->categorie,
            "description" => $request->description,
            "prix" => $request->prix,
            "emplacement" => $request->emplacement,
            "picture" => isset($chemin_image) ? $chemin_image : $ad->picture
        ]);

        // 4. On affiche l'annonce modifié : route("posts.show")
        return redirect(route("index", $ad));
    }
    public function destroy($id)
    {
        $ad = works::find($id);
        if (!$ad || $ad->user_id !== Auth::id()) {  // Vérifie que l'annonce appartient à l'utilisateur
            return redirect(route('index'))->with('error', 'Vous n\'êtes pas autorisé à supprimer cette annonce.');
        }

        // Supprime l'image associée
        Storage::disk('public')->delete($ad->picture);

        // Supprime l'annonce
        $ad->delete();

        return redirect(route('index'))->with('success', 'Annonce supprimée avec succès.');  // Ajout d'un message de succès
    }
    public function acceuil()
    {
        $ads = works::latest()->get();
        return view('acceuil', ['ads' => $ads]);
    }
    public function getAll($id)
    {
        $ad = works::find($id);
        return view('acceuil2',['ad' => $ad]);
    }
}
