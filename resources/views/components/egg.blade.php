@props(['value'])
@if (!(Auth::user()->eggHunt()->where('egg_id', $value)->exists()))
<div>
    <form action="{{ route('eggHunt.add') }}" method="POST">
        @csrf
        <input hidden name="id" value="{{ $value }}">
        <button class="egg" >🥚</button>
    </form>
<style>
    /* Egg Styling */
    .egg {
        position: absolute;
        transform: translateX(-50%);
        font-size: 50px;
        cursor: pointer;
        z-index: 99; 
        animation: shake 0.5s infinite alternate;
    }
    @keyframes shake {
        0% {
            transform: translateX(-50%) rotate(0deg);
        }
        25% {
            transform: translateX(-50%) rotate(5deg);
        }
        50% {
            transform: translateX(-50%) rotate(-5deg);
        }
        75% {
            transform: translateX(-50%) rotate(3deg);
        }
        100% {
            transform: translateX(-50%) rotate(-3deg);
        }
    }
</style>
</div>
@endif


