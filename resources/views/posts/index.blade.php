@extends('master')

@section('title', 'All Post')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <table class="table table-bordered">
                    <tr>
                        <th>Post name:</th>
                        <th>Category:</th>
                        <th>Description:</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->status }}</td>
                    </tr>

                    @endforeach
                </table>

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
