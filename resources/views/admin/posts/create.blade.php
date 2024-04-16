<h1>Cadastrar novo Post</h1>
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title" id="title" placeholder="Título do Post" value="{{old('title')}}">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteúdo do Post">{{old('content')}}</textarea>
    <button type="submit">Enviar</button>
</form>
