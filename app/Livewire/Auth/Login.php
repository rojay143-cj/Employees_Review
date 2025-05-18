<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email;
    public $password;
    public string $error = '';
    protected $rules = [
        'email' => 'required|email|exists:users',
        'password' => 'required|min:8'
    ];
    protected $messages = [
      'email.exists' => 'Invalid email or password',
    ];
    public function login()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        if(!$user || !Hash::check($this->password, $user->password)) {
            return $this->error = 'Login failed';
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        Auth::login($user);
        return redirect()->to('/dashboard');
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
