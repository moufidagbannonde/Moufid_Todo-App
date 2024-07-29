<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;

class todosController extends Controller
{
    /**
     * fonction chargée d'afficher la liste de toutes les tâches
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function index(){
        // liste de toutes les tâches en utilisant la méthode all();
        $todos=todos::all();
        // affichage sous forme de tableau
        $data=compact('todos');
        // affichage de la vue d'accueil avec les articles
        return view("welcome")->with($data);
    }
   
    /**
     * Create and store a newly created resource in storage.
     * Créer et stocker la tâche créée dans la base de données
     */
    
    public function store(Request $request){
        // validation des champs de formulaire pour la créationi d'une tâche
        $request->validate(
            [
                'name'=>'required|max:255',
                'description'=>'required|max:255',
                'author' => 'required|max:50',
                'date'=>'required'
            ]
            );
            // instanciation de la classe des tâches
            $todo = new todos;
            // récupération des données entrées par l'utilisateur

            // nom
            $todo->name=$request['name'];
            // description
            $todo->description=$request['description'];
            // auteur
            $todo->author=$request['author'];
            // date
            $todo->date=$request['date'];
            // sauvegarde des données pour la création d'une tâche
            $todo->save();
            // redirection vers la page d'accueil avec la tâche ajoutée avec un message de succès
            return redirect()->route("todo.home")->with('success','Citation added successfully !');
        }
    
    /**
     * Remove the specified resource from storage.
     * Supprimer  une tâche spécifique dans la base de données
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        // recherche de l'id de la tâche à supprimer et suppression
        todos::find($id)->delete();
        // redirection vers la page d'accueil avec la tâche supprimé 
        // et un message de succès prouvant que la tâche a été supprimée
        return redirect()->route("todo.home")->with('success','Citation deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * Afficher le formulaire pour la modification d'une tâche spécifique
     * @param mixed $id
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        // recherche de l'id de la tâche à modifier
        $todo=todos::find($id);
        // affichage de la tâche
        $data=compact('todo');
        // affichage de la vue avec le formulaire de modification de tâche
        return view("layouts.update")->with($data);
    }

    /**
     * Update the specified resource in storage.
     * Modifier un article spécifique dans la base de données
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateData(Request $request){
        // validation des champs du formulaire de modification
        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'author'=>'required',
                'date'=>'required'
            ]
            );
            // récupération del'id de la tâche à modifier
            $id = $request['id'];
            // recherche de la tâche
            $todo=todos::find($id);            
            
            // récupération des données de modification entrées par l'utilisateur

            // nom
            $todo->name=$request['name'];
            // description
            $todo->description=$request['description'];
            // auteur
            $todo->author=$request['author'];
            // date
            $todo->date=$request['date'];
            // sauvegarde des informations entrées
            $todo->save();
            // redirection vers la page d'accueil avec la tâche modifiée et un message de succès comme preuve
            return redirect()->route("todo.home")->with('success', 'Citation updated successfully');
    }
    /**
     * fonction permettant d'afficher la vue de la page de contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact(){
        return view('partials.contact');
    }
    /**
     * fonction permettant d'afficher la vue de la page about
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function about(){
        return view('partials.about');
    }
}
