<?php

namespace App\Livewire;

use App\Models\employee_documents;
use Livewire\Component;
use App\Models\employees;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Employee extends Component
{   
    use WithFileUploads;

    public $fname = ''; 
    public $lname = ''; 
    public $email = ''; 
    public $position = '';
    public $department = '';
    public $ok = '';
    public $error='';
    public $file;
    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:employees,email',
        'position' => 'required|min:3',
        'department' => 'required|min:3',
        'file' => 'required|file|mimes:pdf,docx,jpg,png|max:2048',
    ];
    public function employees() {
        $this->validate();
        $employee = employees::create([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'position' => $this->position,
            'department' => $this->department
        ]);
        if(!$employee){
            $this->error = 'Employee not added';
            return;
        }
        $this->dispatch('employee-added');
        $employeeID = $employee->id;
        if($employee){
            if ($this->file) {
                $fullName = strtolower(str_replace(' ', '_', $this->fname . '_' . $this->lname));
                $extension = $this->file->getClientOriginalExtension();
                $fileName = $fullName . '_' . $employee->id . '.' . $extension;
    
                // Destination path
                $destinationPath = public_path('assets/employee/documents');

                // Check if file already exists
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
    
                // Get real path of temporary Livewire file
                $tempPath = $this->file->getRealPath();
    
                // Move the file using File facade
                File::move($tempPath, $destinationPath . '/' . $fileName);

                // Insert Documents
                employee_documents::create([
                    'employee_id' => $employeeID,
                    'document_name' => $fileName,
                    'file_path' => 'assets/employee/documents/' . $fileName,
                    'file_type' => $extension
                ]);
        }
            $this->ok = 'Employee added successfully';
            $this->reset(['fname', 'lname', 'email', 'position', 'department', 'file']);
        }
    }
        public function render()
    {
        return view('livewire.employee');
    }
}
