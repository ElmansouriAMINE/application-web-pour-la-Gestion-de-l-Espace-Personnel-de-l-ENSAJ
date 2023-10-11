<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
       return view('auth.passwords.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.verify',['token' => $token], function($message) use ($request) {
                  $message->from($request->email);
                  $message->to($request->email);
                  $message->subject('réinitialiser le mot de passe');
               });

        return back()->with('message', 'Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail !');
    }
}
