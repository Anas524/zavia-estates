<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/', [NewsletterController::class, 'home']);
Route::post('/subscribe-newsletter', [NewsletterController::class, 'store']);

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', fn() => redirect('/'));

// Admin - Only accessible by admin users
Route::get('/admin', [NewsletterController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.newsletter');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// Show the password reset form
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.forgot-password', ['token' => $token]);
})->name('password.reset');

// Handle form submission
Route::post('/reset-password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect('/')->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->name('password.update');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contact', [ContactController::class, 'showAll'])->name('admin.contact');
});