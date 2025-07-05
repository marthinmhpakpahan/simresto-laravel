@include('common.header')
<div class="flex h-screen justify-center items-end">
    <div class="flex flex-col w-max my-10 py-6 rounded-lg px-10">
        <a class="mt-6 btn text-white btn-lg mx-auto border shadow-[-5px_5px_0px_#000000] text-xl font-mono"
            href="{{ route('login') }}">Get Started</a>
    </div>
</div>
@include('common.footer')
