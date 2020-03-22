@extends('_layouts.master')

@section('title', 'Not Found')

@section('body')

<div class="container px-4 mx-auto max-w-lg text-center mt-8">
    <h1 class="text-indigo-700 font-extrabold text-5xl uppercase text-center font-sans">
        404 <span class="text-indigo-500">Not Found</span>
    </h1>
</div>

<div class="container px-4 max-w-sm mx-auto mt-6 text-center">
    <div class="w-100">
        <a href="/" class="text-indigo-300 hover:text-indigo-500">
            <img class="opacity-75 w-auto mx-auto mb-4" src="/assets/images/void.svg" title="Go home" alt="Not found">
        </a>
    </div>
</div>
@endsection
