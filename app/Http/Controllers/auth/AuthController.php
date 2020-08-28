<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\User;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $outh_client = DB::table('oauth_clients')->where('password_client', true)->first();
        $user = User::where('email', $request->email)->first();

        if(empty($user)){
            return response()->jsonError(false, 'User tidak ditemukan', 404);
        }

        $credentials = [
            'client_id' => $outh_client->id,
            'client_secret' => $outh_client->secret,
        ];

        switch ($request->grant_type) {
            case 'refresh_token':
                $credentials['grant_type'] = 'refresh_token';
                $credentials['refresh_token'] = $request->refresh_token;
                break;
            
            default:
                $credentials['grant_type'] = 'password';
                $credentials['username'] = $request->email;
                $credentials['password'] = $request->password;
                break;
        }
       
        $request->request->add($credentials);

        $tokenRequest = $request->create('/oauth/token', 'POST', $request->all());
        $token =  \Route::dispatch($tokenRequest);
        $tokenContent = json_decode($token->getContent(), true);

        if ($token->getStatusCode() == 200) {
            return response()->jsonSuccess($tokenContent);
        }

        return response()->jsonError(false, $tokenContent, $token->getStatusCode());
    }
}
