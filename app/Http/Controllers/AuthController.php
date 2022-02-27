<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;


class AuthController extends Controller
{
    public function signin(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $authUser = Auth::user();
            $succes["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $succes["name"] = $authUser->name;

            return $this->sendResponse($succes, "User signed in");
        } else {
            return $this->sendError("Unauthorized.", ["error" => "Unathorized"]);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        if ($validator->fails()){
            return $this ->sendError("Error validation", $validator->errors());
        
        }

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $succes["token"] = $user ->createToken("MyAuthApp")->plainTextToken;
        $succes["name"]($user->name);

        return $this->sendResponse($succes, "User created succesfully");
    }

}
