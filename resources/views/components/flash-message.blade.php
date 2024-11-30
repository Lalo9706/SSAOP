@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green text-white px-8 py-4 z-50 rounded shadow-lg">
        <p class="font-bold text-lg">
            {{session('message')}}
        </p>
    </div>
@endif