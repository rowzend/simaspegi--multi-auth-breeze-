<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $userRole = Auth::user()->mode;

        switch ($userRole) {
            case 'admin':
                return view('backend.admin.dashboard');
            case 'approval':
                return view('backend.approval.dashboard');
            case 'verifikator':
                return view('backend.verifikator.dashboard');
            case 'user':
                return view('backend.user.dashboard');
            default:
                return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }
}