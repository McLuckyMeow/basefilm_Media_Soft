<?php

namespace App\Http\Controllers;

use App\Directors;
use App\Genres;
use App\User;
use App\Actors;
use App\Films;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class MainController extends Controller
{
    public function main() {
        return view('layouts/app');
    }

    public function film() {

        $form_film = new Films();
        $actor = new Actors();
        $genre = new Genres();
        $director = new Directors();

        $isAdmin=0;
        $id = Auth::id();
        if(!is_null($id))
            $isAdmin = User::find($id)['isAdmin'];

        return view('film', ['form_film' => $form_film->all(),'actor'=> $actor->all(),'director'=> $director->all(),'genre'=> $genre->all(),'isAdmin' => $isAdmin]);
    }

    public function actors() {
        $form_film = new Films();
        $isAdmin=0;
        $id = Auth::id();
        if(!is_null($id))
            $isAdmin = User::find($id)['isAdmin'];
        $actor = new Actors();

        return view('actors', ['form_film' => $form_film->all(),'actor'=> $actor->all(),'isAdmin' => $isAdmin]);
    }

    public function director(){
        $form_film = new Films();
        $actor = new Actors();
        $genre = new Genres();
        $director = new Directors();

        $isAdmin=0;
        $id = Auth::id();
        if(!is_null($id))
            $isAdmin = User::find($id)['isAdmin'];
        return view('director', ['form_film' => $form_film->all(),'actor'=> $actor->all(),'director' => $director->all(),'isAdmin' => $isAdmin]);
    }

    public function genre(){
        $form_film = new Films();
        $actor = new Actors();
        $genre = new Genres();

        $isAdmin=0;
        $id = Auth::id();
        if(!is_null($id))
            $isAdmin = User::find($id)['isAdmin'];
        return view('genre', ['form_film' => $form_film->all(),'actor'=> $actor->all(),'genre'=> $genre->all(),'isAdmin' => $isAdmin]);
    }

    public function actors_check(Request $request){
        $valid = $request->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'date_of_birth' => 'required|min:1|max:25',
        ]);

        $actor = new Actors();
        $actor->name = $request->input('name');
        $actor->surname = $request->input('surname');
        $actor->date_of_birth = $request->input('date_of_birth');
        $actor->film_name = $request->input('film_name');

        $actor->save();

        return redirect()->route('actors');
    }

    public function film_check(Request $request) {
        $valid = $request->validate([
            'name' => 'required|min:4|max:50',
        ]);

        $film = new Films();
        $film->name = $request->input('name');
        $film->actors = $request->input('actors');
        $film->director = $request->input('director');
        $film->genre = $request->input('genre');

        $film->save();

        return redirect()->route('film');
    }

    public function director_check(Request $request) {
        $valid = $request->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
        ]);

        $director = new Directors();
        $director->name = $request->input('name');
        $director->surname = $request->input('surname');
        $director->date_of_birth = $request->input('date_of_birth');
        $director->film_name = $request->input('film_name');

        $director->save();

        return redirect()->route('director');
    }

    public function genre_check(Request $request){
        $valid = $request->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $genre = new Genres();
        $genre->name = $request->input('name');
        $genre->save();

        return redirect()->route('genre');
    }

    public function deleteFilm($id){
        Films::find($id)->delete();
        return redirect('/film');

    }

    public function deleteActor($id){
        Actors::find($id)->delete();
        return redirect('/actors');

    }

    public function deleteDirector($id){
        Directors::find($id)->delete();
        return redirect('/director');

    }

    public function deleteGenre($id){
        Genres::find($id)->delete();
        return redirect('/genre');

    }




/*    public function actor(){
        $film = Films::find(2);
        $actor = Actors::find([1,2,3]);
        $film->actor()->attach($actor);
    }*/

}
