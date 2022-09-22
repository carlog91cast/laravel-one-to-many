@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }} è stato cancellato per sempre dall'orbe terracqueo
            </div>
        @endif
        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->author }}</th>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->post_content }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td><button class="btn btn-primary"><a class="text-decoration-none text-white"
                                    href="{{ route('admin.posts.edit', $post->id) }}">Edit</a></button></td>
                        <td><button class="btn btn-secondary"><a class="text-decoration-none text-white"
                                    href="{{ route('admin.posts.create', $post->id) }}">Create</a></button></td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" value="delete">
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
