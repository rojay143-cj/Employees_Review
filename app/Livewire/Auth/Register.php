<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Http\Request;

class Register extends Component
{
    public string $fname = '';
    public string $lname = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';
    public string $ok = '';
    public string $error = '';

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:confirm_password',
        'confirm_password' => 'required|min:6'

    ];
    protected $messages = [
        'email.unique' => 'Email already exists.',
        'password.same' => 'Passwords do not match.',
        'password.min' => 'Password must be at least 6 characters.',
        'password.required_with' => 'Password is required when confirmation is present.',
        'confirm_password.required' => 'Please confirm your password.',
        'confirm_password.min' => '',
    ];

    public function insert_user()
    {
        $this->validate();
        $insert_user = User::create([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        if (!$insert_user) {
            $this->error = 'Registration failed';
            return;
        } 
        $token = $insert_user->createToken('auth_token')->plainTextToken;
        $this->ok = 'Registration successful';
        $this->reset(['fname', 'lname', 'email', 'password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
