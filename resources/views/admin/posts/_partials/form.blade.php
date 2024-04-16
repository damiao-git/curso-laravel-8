@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@csrf
<input type="text" name="title" id="title" placeholder="Título do Post" value="{{ $post->title ?? old('title')}}">
<textarea name="content" id="content" cols="30" rows="10" placeholder="Conteúdo do Post">{{ $post->content ?? old('content')}}</textarea>
<button type="submit">Enviar</button>
