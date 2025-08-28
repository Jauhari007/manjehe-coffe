<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminActivityLog;

class ProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::guard('admin')->user();
        $logs = AdminActivityLog::where('admin_id', $admin->id)
            ->latest('created_at')
            ->limit(50)
            ->get();
        return view('admin.profile.show', compact('admin','logs'));
    }

    public function updateInfo(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
        ]);
        $admin->update($data);
        return back()->with('success','Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $data = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        if(!Hash::check($data['current_password'],$admin->password)){
            return back()->withErrors(['current_password'=>'Password lama tidak cocok']);
        }
        $admin->password = Hash::make($data['password']);
        $admin->save();
        AdminActivityLog::create([
            'admin_id'=>$admin->id,
            'action'=>'password_update',
            'ip_address'=>$request->ip(),
            'user_agent'=> substr($request->userAgent(),0,255)
        ]);
        return back()->with('success','Password berhasil diubah');
    }
}