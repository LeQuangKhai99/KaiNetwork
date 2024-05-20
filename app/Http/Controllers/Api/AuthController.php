<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends BaseController
{
    public function __construct() {

    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->sendError('The provided credentials are incorrect.');
        }
     
        return $this->sendResponse([
            'user' => $user,
            'token' => $user->createToken('MyApp')->plainTextToken
        ], 'Login Success');
    }
}
