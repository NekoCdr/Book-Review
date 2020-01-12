<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Json;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function userUpdate(Request $request): string
    {
        $answer = [
            'error' => false,
            'message' => '',
            'redirect' => ''
        ];

        try
        {
            $user = Auth::user()->user;

            $validated_data = $request->validate([
                'last_name' => 'required|max:60|string',
                'first_name' => 'required|max:60|string',
                'email' => 'required|string|email|max:255',
                'birthday' => 'date',
            ]);

            $email_verify = User::where('email', $validated_data['email'])->first();

            if($email_verify && $email_verify->id != $user->id)
                throw new \Exception(__('E-mail is busy'));

            $user->update([
                'last_name'  => $validated_data['last_name'],
                'first_name' => $validated_data['first_name'],
                'email'      => $validated_data['email'],
                'birth_date' => $validated_data['birthday'],
            ]);
        }
        catch (\Exception $e)
        {
            $answer['error'] = true;
            $answer['message'] = $e->getMessage();
        }

        return Json::encode($answer);
    }
}
