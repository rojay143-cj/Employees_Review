
<div
    class="add_employeeModal grow-1 absolute w-screen h-screen top-[0] left-0 z-40 hidden">
    <div class="absolute w-screen h-screen top-0 left-0 bg-[#000000] opacity-40 z-20"></div>
    <div class="flex justify-center items-center h-dvh w-screen">
        <form wire:submit.prevent="employees" enctype="multipart/form-data" class="add_employeeForm border-2 border-[#3b83f685] px-5 pb-5 shadow-md shadow-blue-300 bg-white z-30 translate-y-[-100%] transition-all duration-500 ">
            <div class="logo flex items-center w-full flex-col pb-5">
                <span><img src="{{ asset('assets/img/logo_newgen.png') }}" alt="logo" class="w-[150px]"></span>
            </div>
            <div class="flex justify-between flex-col gap-5 max-w-[350px] md:max-w-[400px] w-[350px] md:w-[400px] text-sm">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                    <div>
                        <label for="fname" class="text-gray-700">First Name</label>
                        <div class="relative">
                            <input type="text" wire:model="fname" name="fname" placeholder="Enter first name" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                        <span class="absolute left-0 bottom-[9px] text-gray-400"><i class="fa-solid fa-user"></i></span>
                        </div>
                    </div>
                    <div>
                        <label for="lname" class="text-gray-700">Last Name</label>
                        <input type="text" wire:model="lname" name="lname" placeholder="Enter first name" class="w-full py-2 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                    </div>
                </div>
                <div>
                    <label for="email" class="text-gray-700">Email</label>
                    <div class="relative">
                        <input type="email" wire:model="email" name="email" placeholder="Enter email" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                        <span class="absolute left-0 bottom-[9px] text-gray-400"><i class="fa-solid fa-envelope"></i></span>
                    </div>
                    @error('email') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                    <div>
                        <label for="position" class="text-gray-700">Position</label>
                        <div class="relative">
                            <input type="position" wire:model="position" name="position" placeholder="Enter position" min="8" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                            <span class="absolute left-0 bottom-[9px] text-gray-400"><i class="fa-solid fa-lock"></i></span>
                        </div>    
                        @error('position') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="department" class="text-gray-700">Department</label>
                        <input type="text" name="department" wire:model="department" placeholder="Enter department" min="8" class="w-full py-2 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                        @error('department') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
                {{-- file upload --}}
                <div class="mt-3">
                    <label for="file" class="text-gray-700">Upload Image</label>
                    <input type="file" wire:model="file" name="file" class="w-full py-2 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                    @error('file') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-between gap-3 mt-3">
                    <button type="button" class="closeAddEmployee bg-gray-600 cursor-pointer text-white py-3 px-5 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 w-full">Cancel</button>
                    <button class="bg-blue-600 cursor-pointer text-white py-3 px-5 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 w-full">Add Employee</button>
                </div>
            </div>
            @if ($this->ok)
                <h1 class="p-2 text-green-400 rounded">
                    <i class="fa-solid fa-circle-check fa-beat-fade fa-xl"></i> {{ $this->ok }}
                </h1>
            @endif
            @if ($this->error)
                <h1 class="p-2 text-red-400 rounded">
                    <i class="fa-solid fa-circle-xmark fa-beat-fade fa-xl"></i> {{ $this->error }}
                </h1>
            @endif
        </form>
    </div>
</div>
