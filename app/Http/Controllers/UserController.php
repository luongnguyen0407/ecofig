<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function createUser(Request $req)
    {
        dd($req);
    }
    public function getAll()
    {
        $users = DB::table('users')->get();
        $title = 'List user';
        return view('page.user.home', compact('users', 'title'));
    }
}
