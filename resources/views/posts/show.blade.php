@extends('master')

@section('title', $post->name)

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center">
                        {{ $post->name }}
                    </h1>
                    <h5 class="text-center">
                        Category: {{ $post->category }} | Created at: {{ date("F j, Y, g:i a", strtotime($post->created_at)) }}
                    </h5>
                    <p class="text-center">
                        {{ $post->description }}
                    </p>

                </div>
            </div>
        </div>
    </section>


@endsection
