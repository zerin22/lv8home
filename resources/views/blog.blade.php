@extends('master')

@section('title', $title)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h1 class="text-center">
                {{ $title }}
            </h1>

            <h3 class="text-center">
                <span>Category:</span> {{ $category }} --
                <span>Id:</span> {{ $id }}
            </h3>
            <p class="text-justify">
                {{ $discription }}
            </p>
        </div>
    </div>
</div>

@endsection
