<x-layout>
    <!-- Welcome administrator -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center">
            <h1 class="font-medium text-5xl text-black">Welcome, {{ Auth::user()->name }}!</h1>
        </div>
    </section>
    <!-- Grid content -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 max-w-4xl mx-auto text-center">
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.userdetailmanagement') }}" :active="request()->routeIs('admin.userdetailmanagement')" >User Detail Management</x-admin-nav-link>
    </section>
</x-layout>
