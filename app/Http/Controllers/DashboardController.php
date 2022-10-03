<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
     /* @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        
        
        return view('dashboard');
    }
}
