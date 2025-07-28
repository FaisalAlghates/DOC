<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        $user->update($data);
        return redirect()->route('profile.show')->with('message', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        // Owner له كامل الصلاحيات، يمكنه حذف حسابه
        $user->delete();
        return redirect()->route('login')->with('message', 'Account deleted successfully.');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect()->route('profile.show')->with('message', 'Password changed successfully.');
    }

    public function addDeveloper(Request $request)
    {
        $user = Auth::user();
        // جميع المستخدمين لهم كامل الصلاحيات
        
        $data = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);

        $developer = User::where('email', $data['email'])->first();
        if ($developer && $developer->role !== 'developer') {
            $developer->role = 'developer';
            $developer->save();
            return redirect()->route('profile.show')->with('message', 'تم إضافة المطور بنجاح');
        }

        return redirect()->route('profile.show')->with('error', 'المستخدم غير موجود أو هو مطور بالفعل');
    }
}
