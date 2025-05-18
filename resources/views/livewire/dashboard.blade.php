<div class="flex flex-row gap-5 relative w-screen overflow-hidden">
        <div>
            <div class="h-dvh max-w-[250px] w-[250px] bg-white border-y-[#3b83f685] border-r-[#3b83f685] shadow-md shadow-blue-300 border-2 text-gray-700">
                <div class="flex flex-col justify-between h-full">
                    {{-- Top Section --}}
                    <div class="flex flex-col gap-5">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/img/logo_newgen.png') }}" alt="logo" class="w-[150px]">
                        </div>
        
                        {{-- Navigation --}}
                        <nav id="menu" class="relative flex flex-col px-4 pt-4 text-sm before:absolute before:top-0 before:left-1/2 before:w-[95%] before:h-[2px] before:bg-blue-200 before:-translate-x-1/2">
                            <button 
                                data-id="dashboard"
                                class="EMPLOYEE menu-btn flex items-center gap-2 p-3 mt-5 rounded transition duration-[600ms] cursor-pointer">
                                <i class="fa-solid fa-house"></i>
                                <span>Employees</span>
                            </button>
                        
                            <button 
                                data-id="reviews"
                                class="EMPLOYEE_REVIEWS menu-btn flex items-center gap-2 p-3 rounded transition duration-[600ms] cursor-pointer">
                                <i class="fa-solid fa-chart-line"></i>
                                <span>Reviews</span>
                            </button>

                            <button 
                                data-id="reviews"
                                class="REVIEWS menu-btn flex items-center gap-2 p-3 rounded transition duration-[600ms] cursor-pointer">
                                <i class="fa-solid fa-chart-line"></i>
                                <span>Submit Reviews</span>
                            </button>
                        
                            <button 
                                data-id="profile"
                                class="menu-btn flex items-center gap-2 p-3 rounded transition duration-[600ms] cursor-pointer">
                                <i class="fa-solid fa-user-gear"></i>
                                <span>Profile Settings</span>
                            </button>
                        </nav>           
                    </div>
                    {{-- Logout Button --}}
                    <livewire:auth.logout />
                </div>
            </div>
        </div>
        <div class="w-full EMPLOYEE_DIV">
            {{-- <livewire:view-employees />
            <livewire:employee /> --}}
            <div class="grow-1 p-3 overflow-x-auto lg:overflow-x-hidden w-full text-sm">
                {{-- Add Employee Button --}}
                <div class="flex justify-between flex-col-reverse items-center md:flex-row md:gap-0 gap-3 my-3">
                    {{-- Searchbar here --}}
                    <div class="relative w-full">
                        <input type="text" class="search_employee_input md:w-80 w-full md:h-8 h-10 pl-10 pr-4 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Search..." />
                        <i class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-magnifying-glass"></i></i>
                    </div>
                    <button class="openEmployee rounded-md bg-blue-600 text-white py-2 px-5 md:w-48 w-full md:h-auto h-10 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400">
                        Add Employee <i class="fa-solid fa-user-plus"></i>
                    </button>
                </div>
                
                {{-- Employee Cards --}}
                <div class="employees_card grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-h-[87vh] overflow-y-auto scrollbar">
                    @foreach($employees as $employee)
                        <div class="bg-white border-y-[#3b83f685] border-r-[#3b83f685] border-2 shadow-md shadow-blue-300 rounded-md overflow-hidden flex flex-col justify-between">
                            
                            {{-- Card Header --}}
                            <div class="bg-blue-600 px-4 py-2 text-white font-semibold">
                                {{ $employee->fname }} {{ $employee->lname }}
                            </div>
                            
                            {{-- Card Body --}}
                            <div class="px-4 py-3 text-sm text-gray-700 space-y-1">
                                <div><span class="font-semibold">Name:</span> {{ $employee->fname }} {{ $employee->lname }}</div>
                                <div><span class="font-semibold">Position:</span> {{ $employee->position }}</div>
                                <div><span class="font-semibold">Department:</span> {{ $employee->department }}</div>
                            </div>
                
                            {{-- Action Buttons --}}
                            <div class="px-4 py-3 mt-3 flex justify-between items-center gap-2 bg-blue-400 text-white text-xs font-medium">
                
                                {{-- Edit Button --}}
                                <button type="button" wire:click="edit({{ $employee->id }})"
                                    class="group relative overflow-hidden flex items-center gap-2 text-left bg-white text-gray-700 px-3 py-1.5 rounded transition duration-500 cursor-pointer">
                                    <span class="absolute right-0 top-0 h-full w-0 bg-yellow-500 transition-all duration-500 group-hover:w-full"></span>
                                    <span class="relative flex items-center gap-1 transition-colors duration-500 group-hover:text-white">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit</span>
                                    </span>
                                </button>
                
                                {{-- Download Button --}}
                                <button type="button" wire:click="download({{ $employee->id }})"
                                    class="group relative overflow-hidden flex items-center gap-2 text-left bg-white text-gray-700 px-3 py-1.5 rounded transition duration-500 cursor-pointer"
                                    data-id="{{ $employee->id }}">
                                    <span class="absolute right-0 top-0 h-full w-0 bg-green-500 transition-all duration-500 group-hover:w-full"></span>
                                    <span class="relative flex items-center gap-1 transition-colors duration-500 group-hover:text-white">
                                        <i class="fa-solid fa-download"></i>
                                        <span>Download</span>
                                    </span>
                                </button>
                
                                {{-- Delete Button --}}
                                <button type="button" wire:click="delete({{ $employee->id }})"
                                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                    class="group relative overflow-hidden flex items-center gap-2 text-left bg-white text-gray-700 px-3 py-1.5 rounded transition duration-500 cursor-pointer">
                                    <span class="absolute right-0 top-0 h-full w-0 bg-red-500 transition-all duration-500 group-hover:w-full"></span>
                                    <span class="relative flex items-center gap-1 transition-colors duration-500 group-hover:text-white">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Delete</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <script>
                    window.addEventListener('download-file', event => {
                        const url = event.detail.url;
                        // Open the download URL in a new tab
                        window.open(url, '_blank');
                    });
                </script>                               
                
                {{-- Edit Modal --}}
                @if($showEditModal)
                <div
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                    wire:keydown.escape="$set('showEditModal', false)">
                    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg relative">
                        <h3 class="text-lg font-semibold mb-4">Edit Employee</h3>
                
                        <form wire:submit.prevent="update" class="space-y-4">
                            <div>
                                <label class="block font-medium">First Name</label>
                                <input type="text" wire:model.defer="fname" class="w-full border rounded px-3 py-2" />
                                @error('fname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                
                            <div>
                                <label class="block font-medium">Last Name</label>
                                <input type="text" wire:model.defer="lname" class="w-full border rounded px-3 py-2" />
                                @error('lname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                
                            <div>
                                <label class="block font-medium">Position</label>
                                <input type="text" wire:model.defer="position" class="w-full border rounded px-3 py-2" />
                                @error('position') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                
                            <div>
                                <label class="block font-medium">Department</label>
                                <input type="text" wire:model.defer="department" class="w-full border rounded px-3 py-2" />
                                @error('department') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                
                            <div>
                                <label class="block font-medium">Email</label>
                                <input type="email" wire:model.defer="email" class="w-full border rounded px-3 py-2" />
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                
                            <div class="flex justify-end gap-2 pt-4">
                                <button type="button" wire:click="$set('showEditModal', false)"
                                    class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif                
            </div>
        </div>
        <livewire:employee-reviews />
        <livewire:employee-view-reviews />
    </div>