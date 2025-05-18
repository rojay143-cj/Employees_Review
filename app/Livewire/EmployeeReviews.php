<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\employees;
use App\Models\review_templates;
use App\Models\reviews;

class EmployeeReviews extends Component
{
    public $employee_id;
    public $review_template_id;
    public $review_date;
    public $comments;
    public $rating;
    public $status = 'pending';

    public $successMessage = '';

    protected $rules = [
        'employee_id' => 'required|exists:employees,id',
        'review_template_id' => 'required|exists:review_templates,id',
        'review_date' => 'required|date',
        'comments' => 'nullable|string',
        'rating' => 'nullable|integer|min:1|max:5',
        'status' => 'required|in:pending,completed',
    ];

    public function submit()
    {
        $this->validate();

        reviews::create([
            'employee_id' => $this->employee_id,
            'review_template_id' => $this->review_template_id,
            'review_date' => $this->review_date,
            'comments' => $this->comments,
            'rating' => $this->rating,
            'status' => $this->status,
        ]);

        $this->reset(['employee_id', 'review_template_id', 'review_date', 'comments', 'rating', 'status']);
        $this->successMessage = 'Review submitted successfully!';
    }

    public function render()
    {
        return view('livewire.employee-reviews', [
            'employees' => employees::all(),
            'templates' => review_templates::all(),
        ]);
    }
}
