@include('common.header')
<div class="flex h-screen justify-center items-end">
    <div class="flex flex-col w-max my-10 py-6 rounded-lg sm:px-10 justify-center">
        <a class="mt-6 text-white mx-auto bg-red-700 hover:bg-red-600 px-6 py-3 rounded-xl border-2-black shadow-[-5px_5px_0px_#000000] text-xl font-mono"
            href="{{ route('login') }}">Get Started</a>
    </div>
</div>
@include('common.footer')
