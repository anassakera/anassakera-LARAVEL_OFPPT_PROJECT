<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function redirectToDashboard()
    {
        $user = auth()->user(); 
        switch ($user->account_type) {
            case 'Super_Admin':
                return view('/account_types/superAdmin/superAdmin'); 
                break;
            case 'Admin':
                return view('/account_types/admin/admin');
                break;
            case 'User':
                return view('/account_types/user/user');
                break;
            default:
                return redirect()->route('login')->withErrors('نوع الحساب غير معروف');
        }
    }
}
