@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/95 rounded-3xl shadow-2xl border border-blue-100 p-0 md:p-10 flex flex-col gap-8">
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8 px-6 pt-8">
            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 rounded-full bg-yellow-50 border border-yellow-200">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-10 h-10 text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z'/></svg>
            </div>
            <div class="flex flex-col md:flex-row md:items-end md:justify-between w-full">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-yellow-700 mb-1">Welcome, {{ $user->name }}!</h2>
                    <p class="text-gray-500 text-base md:text-lg">Here you can view and update your profile information.</p>
                </div>
                <div class="mt-2 md:mt-0 md:ml-8 flex flex-col md:items-end">
                    <span class="text-lg font-bold text-black">{{ $user->name }}</span>
                    <span class="text-base text-black">{{ $user->email }}</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-8 px-6 pb-8">
            <div class="profile-card">
                <h3 class="text-xl font-bold text-yellow-700 mb-4">Account Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label class="block text-gray-600 text-sm mb-1">Name</label>
                        <div class="bg-yellow-50 border border-yellow-100 rounded-lg px-4 py-2 text-black">{{ $user->name }}</div>
                    </div>
                    <div>
                        <label class="block text-gray-600 text-sm mb-1">Email</label>
                        <div class="bg-yellow-50 border border-yellow-100 rounded-lg px-4 py-2 text-black">{{ $user->email }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('profile.updatePhone') }}" class="mb-2">
                    @csrf
                    <label class="block text-gray-600 text-sm mb-1" for="phone">Phone Number</label>
                    <div class="flex gap-2">
                        <input id="phone" name="phone" type="text" value="{{ old('phone', $user->phone ?? '') }}" class="border border-yellow-200 rounded-lg px-4 py-2 bg-white text-yellow-900 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-100 transition w-full" placeholder="Enter your phone number">
                        <button type="submit" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white font-bold rounded-lg shadow transition-all duration-150">Save</button>
                    </div>
                    @error('phone')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
                </form>
            </div>
            <div class="profile-card">
                <livewire:profile.update-profile-information-form />
            </div>
            <div class="profile-card">
                <livewire:profile.update-password-form />
            </div>
            <div class="profile-card">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</div>
<style>
.profile-card {
    background: linear-gradient(90deg, #fff 60%, #fef9c3 100%);
    border-radius: 1.5rem;
    box-shadow: 0 2px 12px 0 rgba(251,191,36,0.07);
    padding: 2rem 1.5rem;
    border: 1px solid #fde68a;
    margin-bottom: 0.5rem;
    transition: box-shadow 0.18s cubic-bezier(.4,0,.2,1), transform 0.18s cubic-bezier(.4,0,.2,1);
}
.profile-card:hover, .profile-card:focus-within {
    box-shadow: 0 8px 32px 0 rgba(251,191,36,0.13);
    transform: translateY(-2px) scale(1.02);
}
</style>
@endsection
