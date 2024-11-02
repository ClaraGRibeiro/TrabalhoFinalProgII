<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function destroy(Request $request){
        $user = Auth::user();
        if (!$user) {
            return redirect('/')->with('error', 'Você não está autenticado.');
        }

        $user->delete();
        return redirect('/')->with('msg', 'Conta deletada com sucesso.');
    }
}
