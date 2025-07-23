@extends('layouts.base')

@section('content')
<div class="container py-5">


 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- Optional bottom content --}}
    <div class="text-center text-white mt-5 small">
        Développé avec ❤️ par toi, propulsé par Laravel.
    </div>
</div>
@endsection
