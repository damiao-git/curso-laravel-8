<h1>Editar Post</h1>
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Título do Post" value="{{$post->title}}">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteúdo do Post">{{$post->content}}</textarea>
    <button type="submit">Enviar</button>
</form>
