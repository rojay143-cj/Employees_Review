<div class="flex justify-center items-center h-dvh w-screen">
    <form wire:submit="login" class="border-2 border-[#3b83f685] px-5 pb-5 shadow-md shadow-blue-300">
        <div class="logo flex items-center w-full flex-col pb-5">
            <span><img src="{{ asset('assets/img/logo_newgen.png') }}" alt="logo" class="w-[150px]"></span>
        </div>
        <div class="flex justify-between flex-col gap-5 max-w-[350px] w-[350px] text-sm">
            <div>
                <div>
                    <label for="email" class="text-gray-700">Email</label>
                    <div class="relative">
                        <input type="text" wire:model="email" name="email" placeholder="Enter email" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                        <span class="absolute left-0 bottom-[9px] text-gray-400"><i class="fa-solid fa-user"></i></span>
                    </div>
                </div>
            </div>
            <div>
                <label for="password" class="text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" wire:model="password" name="password" placeholder="Enter password" class="w-full py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 text-gray-500">
                    <span class="absolute left-0 bottom-[9px] text-gray-400"><i class="fa-solid fa-lock"></i></span>
                </div>
                @error('email') <span class="text-[10px] text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <button class="bg-blue-600 cursor-pointer text-white py-2 px-5 mt-1 focus:outline-none border-0 border-b-2 border-gray-300 placeholder:text-gray-400 w-full">Login</button>
                {{-- login button here if user has an account already --}}
                <div class="mt-1 text-xs">
                    <span class="text-gray-500">Doesn't have an account?</span>
                    <a href="{{ route('register') }}" class="text-blue-600 cursor-pointer py-1 focus:outline-none border-0 border-b-2 border-blue-400 placeholder:text-blue-400 w-full">Register</a>
                </div>
            </div>
            @if ($this->error)
                <h1 class="p-2 text-red-400 rounded">
                    <i class="fa-solid fa-circle-xmark fa-beat-fade fa-xl"></i> {{ $this->error }}
                </h1>
            @endif
        </div>
    </form>
</div>