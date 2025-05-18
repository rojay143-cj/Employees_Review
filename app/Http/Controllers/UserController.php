<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserScore($id)
    {
        $user = User::findOrFail($id);
        return $user->posts * 5 + $user->comments * 2;
    }
}
