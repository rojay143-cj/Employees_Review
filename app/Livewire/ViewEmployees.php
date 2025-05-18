<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\employees;

class ViewEmployees extends Component
{
    use WithPagination;
    public $firstname;
    public $lastname;
    public $email;
    public $position;
    public $department;
    public $temp_name;
    public $rating;
    
    public function render()
    {
        return view('livewire.view-employees',[
            'employees' => employees::all()
        ]);
    }
}
