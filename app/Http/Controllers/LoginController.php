<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($member = Member::query()->firstWhere(['email' => $email]))
        {
            if (Hash::check($password, $member->password))
            {
                $memberToken = MemberToken::create([
                    'member_id' => $member->id,
                    'auth_key' => $this->randomString(),
                ]);

                if ($memberToken)
                {
                    return $this->response(200, true, [
                        'token' => $memberToken->auth_key,
                        'user' => [
                            'id' => $member->id,
                            'email' => $member->email,
                        ],
                    ]);
                }

                return $this->response(401, false, 'Unauthorized');
            }

            return $this->response(400, false, 'Password tidak valid');
        }

        return $this->response(400, false, 'Email tidak ditemukan');
    }

    public function randomString($length = 100)
    {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        for ($i=0; $i<$length; $i++)
        {
            $str .= $karakter[rand(0, strlen($karakter) - 1)];
        }

        return $str;
    }
}