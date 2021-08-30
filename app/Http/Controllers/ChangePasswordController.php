<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    
    public function changePassword(Request $request, User $user) {

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],            
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message', 'Шифра корисника је успешно ажурирана.');

    }

}
