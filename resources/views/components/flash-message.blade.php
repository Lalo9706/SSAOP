@if(session()->has('message'))
    <div x-data="{show: true}" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show" 
         class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-black dark:bg-white text-white dark:text-black px-8 py-3 rounded-lg shadow-lg z-50">
        <p class="font-bold text-lg text-center">
            {{ session('message') }}
        </p>
    </div>
@endif

