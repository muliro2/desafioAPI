<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){

        $bands = $this -> getBands();

        return response() -> json($bands);
    }

    protected function getBands(){
        return [
            [ 'id' => 1, 'name' => 'mc poze', 'gender' => 'funk'],
            [ 'id' => 2, 'name' => 'mc ryan', 'gender' => 'funk'],
            [ 'id' => 3, 'name' => 'mc melody', 'gender' => 'pop'],
            [ 'id' => 4, 'name' => 'restart', 'gender' => 'rock']
        ];
    }

    public function getById($id){
        $band = null;

        foreach ($this -> getBands() as $_band) {
            if ($id == $_band['id']) {
                $band = $_band;
            }
        }
        return $band ? response() -> json($band) :abort(404);
    }

    public function getByGender($gender){
        $bands = [];

        foreach ($this -> getBands() as $_band) {
            if ($gender == $_band['gender']) {
                $bands = $_band;
            }
        }
        return $bands ? response() -> json($bands) :abort(404);
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'id' => 'numeric',
            'name' => 'required|min:3',
            'gender' => 'required',

        ]);

        return response() -> json($validated);
    }

}
