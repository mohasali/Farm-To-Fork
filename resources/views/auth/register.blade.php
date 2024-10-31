<x-layout>
<div class="flex justify-center p-4">
    <form class="flex flex-col bg-white p-16 pt-6 rounded w-[40%] max-w-[500px] border-[3px] border-primary" method="POST" action="/register">
        <h3 class=" font-bold text-5xl text-center pb-9 ">Register</h3>
        @csrf
        <labe class="font-bold">Full Name</labe>
        <x-input/>
        <label class="font-bold">Email</label>
        <x-input/>
        <label class="font-bold">Confirm Email</label>
        <x-input/>
        <label class="font-bold">Password</label>
        <x-input/>
        <label class="font-bold">Confirm Password</label>
        <x-input/>
        <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Submit</button>
    </form>
</div>
</x-layout>