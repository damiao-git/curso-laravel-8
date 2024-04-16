    @extends('admin.posts.layouts.app')
    @section('title', 'Detalhes do Post')
    @section('content')

    <h1>Details</h1>
    <div>
        <label>Id:</label>
        <input type="text" name="id" id="id" value="{{ $post->id }}" disabled>
        <br>
        <label>Title:</label>
        <input type="text" name="id" id="id" value="{{ $post->title }}">
        <br>
        <label>Content:</label>
        <input type="text" name="id" id="id" value="{{ $post->content }}">
    </div>
    <div>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger">Deletar Post: {{$post->title}}</button>
        </form>

        <a href="{{ url()->previous() }} "class="btn btn-primary ">Voltar</a>
    </div>
    @endsection

