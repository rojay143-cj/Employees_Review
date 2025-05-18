<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Reviews;


class EmployeeViewReviews extends Component
{
    public $reviews;
    public $editing = false;
    public $editId, $comments, $rating, $status;

    public function mount()
    {
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = Reviews::with(['employee', 'template'])->latest()->get();
    }

    public function delete($id)
    {
        Reviews::findOrFail($id)->delete();
        session()->flash('message', 'Review deleted successfully.');
        $this->loadReviews();
    }

    public function edit($id)
    {
        $review = Reviews::findOrFail($id);
        $this->editId = $review->id;
        $this->comments = $review->comments;
        $this->rating = $review->rating;
        $this->status = $review->status;
        $this->editing = true;
    }

    public function update()
    {
        $this->validate([
            'comments' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:pending,completed',
        ]);

        $review = Reviews::findOrFail($this->editId);
        $review->update([
            'comments' => $this->comments,
            'rating' => $this->rating,
            'status' => $this->status,
        ]);
        $this->editing = false;
        session()->flash('message', 'Review updated successfully.');
        $this->loadReviews();
    }

    public function render()
    {
        return view('livewire.employee-view-reviews');
    }
}
