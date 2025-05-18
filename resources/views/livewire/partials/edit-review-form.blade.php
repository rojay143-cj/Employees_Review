<div class="edi_reviewModal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
        <h3 class="text-xl font-semibold mb-4">Edit Review</h3>
        <form wire:submit.prevent="update" class="space-y-4">
            <div>
                <label class="block text-sm">Comments</label>
                <textarea wire:model.defer="comments" class="w-full border rounded p-2" rows="3"></textarea>
                @error('comments') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Rating</label>
                <input type="number" wire:model.defer="rating" min="1" max="5" class="w-full border rounded p-2" />
                @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Status</label>
                <select wire:model.defer="status" class="w-full border rounded p-2">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="$set('editing', false)" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="btn_employee_review_update bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
