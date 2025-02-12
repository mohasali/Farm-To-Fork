@props(['user'])

<!-- User Card -->
<div class="bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
    <!-- Customer Image -->
    <div class="w-20 h-20 rounded-lg flex-shrink-0">
        <!-- User Image / Default pfp atm -->
        <img src="{{ $user->image ?? '/images/Placeholder.jpeg' }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-lg"/> 
    </div>
    <!-- Customer Info -->
    <div class="flex-1 w-full">
        <div class="flex items-center space-x-2">
            <!-- ID -->
            <input type="text" value="{{ $user->id }}" class="w-full px-3 py-2 bg-gray-100 rounded-md" disabled>
            <!-- Edit Icon -->
            <a href="" class="w-8 h-8 border rounded-md flex items-center justify-center">
                <img src="/images/Edit.png" alt="Edit icon" class="w-5 h-5"/>
            </a>
        </div>
        <!-- Name -->
        <input type="text" value="{{ $user->name }}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
        <!-- Buttons -->
        <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0">
            <button class="w-full md:w-1/2 bg-gray-100 rounded-lg py-2 text-center">Personal Order History</button>
            <button class="w-full md:w-1/4 bg-gray-100 rounded-lg py-2 text-center">Expand Info</button>
        </div>
    </div>
</div>
