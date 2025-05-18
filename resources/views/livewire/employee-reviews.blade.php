<div class="flex justify-center items-center h-dvh w-screen REVIEWS_DIV" style="display: none">
    <form wire:submit.prevent="submit" class="border-2 border-[#3b83f685] px-5 pb-5 shadow-md shadow-blue-300">
        <!-- Title / Header -->
        <div class="flex items-center justify-center w-full flex-col pb-5 pt-5">
            <h2 class="text-xl font-semibold text-blue-600">Submit Employee Review</h2>
            <p class="text-xs text-gray-500">Fill out the form below to submit a performance review</p>
        </div>
        <div class="flex flex-col gap-5 max-w-[350px] md:max-w-[400px] w-[350px] md:w-[400px] text-sm">
            <div>
                <label class="text-gray-700">Select Employee</label>
                <div class="relative">
                    <select wire:model="employee_id" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent appearance-none">
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->fname }} {{ $emp->lname }}</option>
                        @endforeach
                    </select>
                </div>
                @error('employee_id') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-gray-700">Select Review Template</label>
                <div class="relative">
                    <select wire:model="review_template_id" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent appearance-none">
                        <option value="">-- Select Template --</option>
                        @foreach($templates as $template)
                            <option value="{{ $template->id }}">{{ $template->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('review_template_id') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-gray-700">Review Date</label>
                <input type="date" wire:model="review_date" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent">
                @error('review_date') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-gray-700">Comments</label>
                <textarea wire:model="comments" rows="3" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent" placeholder="Enter your comments"></textarea>
                @error('comments') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                <div>
                    <label class="text-gray-700">Rating (1–5)</label>
                    <input type="number" wire:model="rating" min="1" max="5" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent" placeholder="1 to 5">
                    @error('rating') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="text-gray-700">Status</label>
                    <select wire:model="status" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 text-gray-500 bg-transparent appearance-none">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                    @error('status') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 cursor-pointer text-white py-3 px-5 mt-5 focus:outline-none border-0 border-b-2 border-gray-300 w-full">
                    Submit Review
                </button>
            </div>

            @if ($successMessage)
                <h1 class="p-2 text-green-400 rounded">
                    <i class="fa-solid fa-circle-check fa-beat-fade fa-xl"></i> {{ $successMessage }}
                </h1>
            @endif
        </div>
    </form>
</div>
