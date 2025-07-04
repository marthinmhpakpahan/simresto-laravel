@include('common.header')
<div class="flex h-screen justify-center">
    <div class="flex flex-col bg-primary w-max my-10 py-6 rounded-lg px-10">
        <div class="flex justify-center">
            <h2 class="text-6xl text-white font-mono font-bold">Sistem Informasi Manajemen</h2>
        </div>
        <div class="mt-4">
            <img class="mx-auto w-[350px]" src="{{ asset('assets/img/logos/dimxue.png') }}" />
        </div>
        <div class="flex justify-center">
            <h2 class="text-6xl text-white font-mono font-bold">Restoran</h2>
        </div>
        <a class="mt-6 btn text-white btn-lg mx-auto border shadow-[-5px_5px_0px_#000000] text-xl font-mono"
            href="{{ route('login') }}">Get Started</a>
    </div>
</div>
@include('common.footer')
