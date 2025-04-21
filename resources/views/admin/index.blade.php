<x-layout title="Admin | Home">
    <!-- Welcome administrator -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center">
            <h1 class="font-medium text-5xl">Welcome, {{ Auth::user()->name }}!</h1>
        </div>
    </section>
    <!-- Grid content -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 max-w-4xl mx-auto text-center">
        <x-admin-nav-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')" >User Detail Management</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.orders') }}" :active="request()->routeIs('admin.orders')" >Order Processing List</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.inventory') }}" :active="request()->routeIs('admin.inventory')" >Inventory Management - Products</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.products') }}" :active="request()->routeIs('admin.products')" >Add New Product</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.customers') }}" :active="request()->routeIs('admin.customers')" >Customers</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.reports') }}" :active="request()->routeIs('admin.reports')" >Reports</x-admin-nav-link>
        <x-admin-nav-link href="{{ route('admin.enquiries') }}" :active="request()->routeIs('admin.enquirie')" >Enquiries</x-admin-nav-link>
    </section>
</x-layout>
