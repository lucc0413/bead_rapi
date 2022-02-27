<?php

namespace App\Http\Controllers;

use App\Http\Resources\Termekek as ResourcesTermekek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\termekek;
use Illuminate\Support\Facades\Validator;


class TermekController extends Controller
{
    public function index(){
        $termekek = termekek::all();

        return $this -> sendResponse (Termekek::collection ($termekek), "Posts fetched");
    }
   
    public function store (Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            "title" => "required",
            "descriptiom" => "required"
        ]);

        if ($validator->fails()){
            return $this->sendError ($validator->errors());
    }
        $termekek=Termekek::create($input);
        return $this ->sendResponse(new Termekek($termekek), "Post created");
}

public function update (Request $request, Termekek $termek) {
    $input = $request->all();
    $validator = Validator::make ($input, [
        "title" => "required",
        "description" => "requires"
    ]);

    if ($validator->fails()){
        return $this->sendError($validator->errors());
    }

    $termek->title=$input["title"];
    $termek->description=$input["description"];
    $termek->save();

    return $this->sendResponse(new Termekek ($termek), "Post updated");
}

  public function destroy (Termekek $termek){
        $termek->delete();

        return $this->sendResponse([], "Post deleted");
    }
}