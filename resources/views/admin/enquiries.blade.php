<x-layout title="Admin | Enquiries">
    <!-- Enquiries Header -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Enquiries</h1>
        </div>
    </section>

    <!-- Search and Filter -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-lg rounded-lg">
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-2">
                <form class="relative w-full md:w-80 flex" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for an enquiry..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out" value="{{ request('q') }}">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
                <form action="" method="GET">
                    <select class="w-full md:w-auto bg-gray-100 rounded-lg py-2 px-4" name="seen" onchange="this.form.submit()">
                        <option value="" hidden>Filter by Seen</option>
                        <option value="1" {{ request('seen') === '1' ? 'selected' : '' }}>Seen</option>
                        <option value="0" {{ request('seen') === '0' ? 'selected' : '' }}>Not Seen</option>
                    </select>
                </form>
            </div>
        </div>
    </section>

    <!-- Display Enquiries -->
    <section class="gap-4 p-6 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            @if($enquiries->isEmpty())
                <p>No enquiries found.</p>
            @else
                @foreach ($enquiries as $enquiry)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                            <div class="ml-4 text-center md:text-left">
                                <h3 class="font-medium text-lg">{{ $enquiry->forename }} {{ $enquiry->surname }}</h3>
                                <p class="text-gray-500">{{ $enquiry->email }} | {{ $enquiry->phone }}</p>
                                <p class="mt-2 text-gray-700">{{ $enquiry->message }}</p>
                                <p class="text-sm text-gray-400">{{ $enquiry->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <div class="mt-2 ml-4 text-center md:text-left">
                            <form method="POST" action="{{ route('enquiries.toggle-seen', $enquiry->id) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 rounded-lg text-white {{ $enquiry->seen ? 'bg-green-500' : 'bg-gray-500' }} hover:opacity-80 transition">
                                    {{ $enquiry->seen ? 'Seen' : 'Mark as Seen' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>