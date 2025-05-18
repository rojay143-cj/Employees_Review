<div class="p-6 EMPLOYEE_REVIEWS_DIV" @if(!$editing) style="display: none;" @endif>
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Employee Reviews</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-h-[87vh] overflow-y-auto scrollbar]">
        @foreach ($reviews as $review)
            <div class="bg-white shadow-md rounded-lg p-5 relative border-l-4 border-blue-500 w-[300px] max-w-[300px] min-w-[300px]">
                <h3 class="text-lg font-bold text-gray-700 mb-2">{{ $review->employee->fname }} {{ $review->employee->lname }}</h3>
                <p class="text-sm text-gray-600">
                    <strong>Template:</strong>
                    {{ $review->template?->title ?? 'N/A' }}
                </p>                
                <p class="text-sm text-gray-600"><strong>Date:</strong> {{ \Carbon\Carbon::parse($review->review_date)->format('M d, Y') }}</p>
                <p class="text-sm text-gray-600"><strong>Rating:</strong> {{ $review->rating }} / 5</p>
                <p class="text-sm text-gray-600"><strong>Status:</strong> 
                    <span class="px-2 py-1 rounded {{ $review->status === 'completed' ? 'bg-green-200 text-green-700' : 'bg-yellow-200 text-yellow-800' }}">
                        {{ ucfirst($review->status) }}
                    </span>
                </p>
                <p class="text-sm text-gray-500 mt-2 italic">"{{ $review->comments }}"</p>

                <div class="flex justify-end gap-2 px-2 pb-4 text-sm">
                    {{-- Edit Button --}}
                    <button type="button"
                        wire:click="edit({{ $review->id }})"
                        class="group relative overflow-hidden flex items-center gap-2 text-left bg-white text-blue-600 px-3 py-1.5 rounded transition duration-500 cursor-pointer">
                        <span class="absolute right-0 top-0 h-full w-0 bg-blue-600 transition-all duration-500 group-hover:w-full"></span>
                        <span class="relative flex items-center gap-1 transition-colors duration-500 group-hover:text-white">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Edit</span>
                        </span>
                    </button>
                
                    {{-- Delete Button --}}
                    <button type="button"
                        wire:click="delete({{ $review->id }})"
                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                        class="group relative overflow-hidden flex items-center gap-2 text-left bg-white text-red-600 px-3 py-1.5 rounded transition duration-500 cursor-pointer">
                        <span class="absolute right-0 top-0 h-full w-0 bg-red-600 transition-all duration-500 group-hover:w-full"></span>
                        <span class="relative flex items-center gap-1 transition-colors duration-500 group-hover:text-white">
                            <i class="fa-solid fa-trash"></i>
                            <span>Delete</span>
                        </span>
                    </button>
                </div>                
            </div>
        @endforeach
    </div>

    {{-- Optional Modal or Inline form for updating --}}
    @if ($editing)
        @include('livewire.partials.edit-review-form')
    @endif
</div>
