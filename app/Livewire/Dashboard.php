<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\employees;
use App\Models\employee_documents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class Dashboard extends Component
{
    public $showEditModal = false;
    public $editEmployeeId = null;

    // Editable fields
    public $fname;
    public $lname;
    public $email;
    public $position;
    public $department;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:employees,email',
        'position' => 'required|min:3',
        'department' => 'required|min:3',
    ];

    // Load employee data to edit form and show modal
    public function edit($id)
    {
        $employee = employees::find($id);
        if (!$employee) {
            session()->flash('error', 'Employee not found');
            return;
        }

        $this->editEmployeeId = $employee->id;
        $this->fname = $employee->fname;
        $this->lname = $employee->lname;
        $this->email = $employee->email;
        $this->position = $employee->position;
        $this->department = $employee->department;

        $this->showEditModal = true;
    }

    // Update employee data
    public function update()
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:employees,email,' . $this->editEmployeeId,
            'position' => 'required|min:3',
            'department' => 'required|min:3',
        ]);

        $employee = employees::find($this->editEmployeeId);
        if (!$employee) {
            session()->flash('error', 'Employee not found');
            return;
        }

        $employee->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'position' => $this->position,
            'department' => $this->department,
        ]);

        $this->showEditModal = false;
        session()->flash('success', 'Employee updated successfully');
    }

    // Delete employee and related documents
    public function delete($id)
    {
        $employee = employees::find($id);
        if (!$employee) {
            session()->flash('error', 'Employee not found');
            return;
        }

        // Delete related documents files if needed
        $documents = employee_documents::where('employee_id', $id)->get();
        foreach ($documents as $doc) {
            if (file_exists(public_path($doc->file_path))) {
                unlink(public_path($doc->file_path));
            }
            $doc->delete();
        }

        $employee->delete();

        session()->flash('success', 'Employee deleted successfully');
    }

    // Download employee document
    public function download($id)
    {
        $document = employee_documents::find($id);

        if (!$document || !file_exists(public_path($document->file_path))) {
            session()->flash('error', 'Document not found');
            return;
        }

        $url = route('employee-documents.download', ['id' => $document->id]);
        $this->dispatchBrowserEvent('download-file', ['url' => $url]);
    }

    public function render()
    {
        $employees = DB::table('employees')
            ->join('employee_documents', 'employees.id', '=', 'employee_documents.employee_id')
            ->select('employees.*', 'employee_documents.document_name', 'employee_documents.file_path')
            ->get();

        return view('livewire.dashboard', [
            'employees' => $employees,
        ]);
    }
}
