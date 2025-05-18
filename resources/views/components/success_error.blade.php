<div class="px-3 py-3 lg:px-8 text-center mb-3 w-full">
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h1 class="p-2 text-red-400 rounded"><i class="fa-solid fa-circle-exclamation fa-beat-fade fa-xl"></i> {{ $error }}</h1>
            @endforeach
        @endif
        @if(session()->has('error'))
            <h1 class="p-2 text-red-400 rounded"><i class="fa-solid fa-circle-exclamation fa-beat-fade fa-xl"></i> {{ session('error') }}</h1>
        @endif
        @if(session()->has('success'))
        <div id="success-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 pointer-events-none">
            <div class="bg-slate-300 p-8 shadow-lg">
                <div class="success-animation">
                    <img src="{{ asset('assets/image/material/success.gif') }}" alt="Success" class="w-50 h-50 mx-auto">
                </div>
                <span class="text-green-600 text-lg font-semibold mt-4">{{ session('success') }}</span>
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {
        const successModal = $('#success-modal');
        successModal.removeClass('pointer-events-none');

        successModal.removeClass('hidden');

        setTimeout(function() {
            successModal.addClass('opacity-0').delay(500).queue(function(next) {
                $(this).addClass('hidden');
                next();
            });
        }, 3000);
    });
</script>
