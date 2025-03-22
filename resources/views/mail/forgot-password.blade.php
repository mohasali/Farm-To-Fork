
@extends('components.email-layout')
<div class="flex flex-col mt-12 bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary m-auto">
    <h1 class=" font-bold text-5xl text-center mt-5 pb-5">Hello,</h1>
    <p class="items-center text-center text-lg mt-6 mb-6">You can find the link to resetting your password <a href="{{route('change.password', $token)}}">here.</a></p>
    <div class="flex justify-center mb-6">
        <a href="{{route('change.password', $token)}}" class="px-7 py-3 mt-4 flex-col justify-center text-center bg-primary text-white rounded-lg hover:bg-accent1 text-lg md:text-2xl font-bold transition duration-300 ease-in-out">Reset Password</a>  
    </div>
    <p class="items-center text-center text-lg mt-6 mb-4">Thank you!</p>
    <p class="items-center text-center text-lg mt-2 mb-6"> Farm to Fork</p>
</div>