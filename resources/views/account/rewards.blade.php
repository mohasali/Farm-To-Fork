<x-account-layout>
    <h1 class="text-2xl font-semibold">Your Rewards</h1>
    <!-- Stamp system  --- Component for later | make it simple -->
    <div>
        <h1 class="text-1xl font-semibold pt-4">Daily Rewards</h1>
        <p class="text-sm text-gray-500 mb-2">Stamp your card</p> 
        <div class="flex justify-center">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-6">
                @for($i = 0; $i < $reward->stamps; $i++ )
                <button class="rounded-full bg-green-700 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center"></button>
                @endfor
                @for($i = 0; $i < 6-$reward->stamps; $i++ )
                <form action="{{ route('reward.stamp') }}" method="POST">
                    @csrf
                    <button class="rounded-full bg-gray-300 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                </form>
                @endfor
            </div>

        </div>
        @if($reward->stamps == 6)
        <div class="flex justify-center mt-4">
            <form action="{{ route('reward.claim') }}" method="POST">
                @csrf
            <button class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-accent1">
                Claim Promo Code
            </button>
        </form>
        </div>
        @endif
    </div>
    <!-- Promo Codes --- Get a component later to make it simple -->
    <h1 class="text-1xl font-semibold mb-2">Promo Codes</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 p-4">
        @foreach ($promoCodes as $promo)
            <!-- Card -->
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-primary text-white px-2 py-0.5 rounded-full font-semibold">{{ $promo->code }}</h1>
                <h1 class="text-md font-bold mt-2 text-center">{{ $promo->title }}</h1>
            </div>
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">{{ $promo->description }}</p>
            <!-- View Button -->
            <button onclick="copyToClipboard('{{ $promo->code }}')" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">Copy</button>
        </div>
        @endforeach
        </div>
    </div>
</x-account-layout>

<script>
    function copyToClipboard(promoCode) {
        navigator.clipboard.writeText(promoCode).then(function() {
            alert('Promo code copied to clipboard!'); 
        });
    }
</script>



<!--

- Become a member get £5 off
- Spend £100 to get £15
- Specific items has discounts


-->