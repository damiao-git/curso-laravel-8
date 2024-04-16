@extends('admin\posts\layouts\app')

@section('title', 'Listagem dos Posts')

@section('content')
    @if (session('message'))
        <div class="text-danger">{{ session('message') }}</div>
    @endif

    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Novo Post</a>
    <br>
    <br>
    <table class="table table-striped border-success text-center ">
        <tbody>
            <tr>
                <th>&nbsp;ID</th>
                <th>&nbsp;Post</th>
                <th>&nbsp;Conteúdo</th>
                <th colspan="2">&nbsp;Detalhes</th>
            </tr>
            <tr>
                @foreach ($posts as $post)
            <tr>
                <td>
                    <p>{{ $post->id }}</p>
                </td>
                <td>
                    <p>{{ $post->title }}</p>
                </td>
                <td>
                    <p>{{ $post->content }}</p>
                </td>
                <td>
                    <p><a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Ver</a></p>
                </td>
                <td>
                    <p><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a></p>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif
@endsection
