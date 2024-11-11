<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
            
            $rules =
            [
                'email'=>'required|email',
                'password'=>'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($validator,$code);
            }

            $credentials = $request->only(['email','password']);
            $token = Auth::guard('api')->attempt($credentials);
            if(!$token){
                return response()->json([
                    'msg'=>'wrong email or password',
                ]);
            }
            $user = Auth::guard('api')->user();
            $user->token = $token;
            return response()->json([
                'msg'=>$user
            ]);


        }catch(Exception $e){
            return $e->getMessage();
        }

    }


    public function register(Request $request){
        $rules =
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return 'Error';
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        if($user){
            return $this->login($request);
        }
        return response()->json(['msg'=>'error']);
    }


    public function logout(Request $request){
        JWTAuth::invalidate($request->token);
        return response()->json(['msg'=>'success']);

    }

    public function refresh(Request $request){
        $new_token = JWTAuth::refresh($request->token);
        return response()->json(['msg'=>$new_token]);
    }
}
