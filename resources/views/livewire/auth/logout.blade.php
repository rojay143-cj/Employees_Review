<div class="px-2 text-sm pb-4">
    <button wire:click="logout" type="button"
        class="group relative overflow-hidden float-right flex items-center gap-2 text-left bg-white text-gray-700 p-2 rounded transition duration-500 cursor-pointer">
        
        <!-- Sliding background -->
        <span class="absolute right-0 top-0 h-full w-0 bg-red-500 text-gray-700 transition-all duration-500 group-hover:w-full"></span>
        
        <!-- Content stays above -->
        <span class="relative flex items-center gap-2 transition-colors duration-500 group-hover:text-white">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </span>
    </button>
</div>