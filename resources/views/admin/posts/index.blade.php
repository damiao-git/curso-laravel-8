@extends('admin\posts\layouts\app')

@section('title', 'Listagem dos Posts')

@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Posts</h1>
    <button><a href="{{ route('posts.create') }}">Novo Post</a></button>
    <table>
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
                    <p><a href="{{ route('posts.show', $post->id) }}">Ver</a></p>
                </td>
                <td>
                    <p><a href="{{ route('posts.edit', $post->id) }}">Editar</a></p>
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
