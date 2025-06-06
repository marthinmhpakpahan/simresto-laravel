@include('common.header')
<div class="flex flex-col container bg-primary my-10 py-6 rounded-lg">
    <div class="flex justify-center">
        <h2 class="text-6xl text-white font-mono font-bold">Sistem Informasi Manajemen</h2>
    </div>
    <div class="mt-4">
        <img class="mx-auto" src="{{ asset('assets/img/icon_restaurant_white.png') }}" />
    </div>
    <div class="flex justify-center">
        <h2 class="text-6xl text-white font-mono font-bold">Restoran</h2>
    </div>
    <a class="mt-10 btn text-white btn-lg mx-auto border shadow-[-5px_5px_0px_#000000] text-xl font-mono" href="{{ route('login') }}">Get Started</a>
</div>
@include('common.footer')
