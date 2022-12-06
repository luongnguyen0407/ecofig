<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestRegister;
use App\Jobs\RegisterMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function Login(RequestLogin $req)
    {
        $password = $req->input('password');
        $email = $req->input('email');
        // $errors = new MessageBag();
        $user = User::where([
            'email' => $email,
            'status' => 1
        ])->first();
        // dd($user->email);
        if (Hash::check($password, $user->password)) {
            dd('ok');
        } else {
            return redirect(route('auth.login'))
                ->withErrors(['email' => 'Invalid user name or password'])
                ->withInput([
                    'email' => $email
                ]);
        }
    }
    public function Active($code, $email)
    {
        $user = User::where([
            'email' => $email,
            'active_code' => $code,
            'status' => 0
        ])->first();

        if ($user) {
            $user->update([
                'active_code' => 0,
                'status' => 1
            ]);
            return redirect(route('auth.login'))->with('message', 'Kích hoạt thành công');
        }
        return redirect(route('auth.login'))->with('message', 'Tài khoản đã kích hoạt');

        // $user = $req
        # code...

    }
    public function Register(RequestRegister $req)
    {
        # code...
        $data = $req->all();
        $passHash = Hash::make($data['password']);
        $activeCode = uniqid();
        $activeLink = join('/', array($req->getSchemeAndHttpHost(), 'auth', 'active', $activeCode, $data['email']));
        User::create([
            'name' => $data['username'],
            'password' => $passHash,
            'email' => $data['email'],
            'active_code' => $activeCode
        ]);
        RegisterMailJob::dispatch($data['username'], $activeLink, $data['email']);
        return redirect(route('auth.login'))->with('message', 'Kiểm tra email của bạn');
    }
    public function Forgot(Request $req)
    {
        $email = $req->input('email');
        $user = User::where([
            'email' => $email,
            'status' => 1
        ])->first();
        if (!$user) return response()->json(['message' => 'Invalid email'], 406);
        $resetCode = uniqid();
        $activeLink = join('/', array($req->getSchemeAndHttpHost(), 'auth', 'forgotpass', $resetCode, $email));
        RegisterMailJob::dispatch($user->username, $activeLink, $email);
        return response()->json(['message' => 'ok']);
    }
}
