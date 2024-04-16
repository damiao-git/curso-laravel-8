@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@csrf

<div class=mb-3>
    <input type="text" name="title" class="form-control" id="title" placeholder="Título do Post"
        value="{{ $post->title ?? old('title') }}">
    <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Conteúdo do Post">{{ $post->content ?? old('content') }}</textarea>
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
