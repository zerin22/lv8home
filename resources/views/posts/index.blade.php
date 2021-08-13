@extends('master')

@section('title', 'All Post')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if (session('successMessage'))
                    <div class="alert alert-success text-center">
                        {{ session('successMessage') }}
                    </div>
                @endif
                <a href="{{ route('post.create') }}" class="btn btn-success mb-2">New Post</a>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>Post name:</th>
                        <th>Category:</th>
                        <th>Description:</th>
                        <th>Status</th>
                        <th style="width:15%">Action</th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr class="text-center">
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}">Show</a> |
                            <a href="{{ route('post.edit', $post->id) }}">Edit</a> |
                            <a href="" onclick="event.preventDefault();document.getElementById('delete-form{{ $post->id }}').submit();">Delete</a>
                            <form action="{{ route('post.destory', $post->id) }}" id="delete-form{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </table>

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
