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
