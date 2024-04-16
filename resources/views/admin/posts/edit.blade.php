@extends('admin.posts.layouts.app')
@section('title', 'Editar Post')
@section('content')
<h1>Editar Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @method('put')
    @include('admin.posts._partials.form')
</form>

<button><a href="{{ url()->previous() }}">Voltar</a></button>
@endsection
