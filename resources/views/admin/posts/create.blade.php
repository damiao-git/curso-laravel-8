@extends('admin.posts.layouts.app')
@section('title', 'Criar Post')
@section('content')

<h1>Cadastrar novo Post</h1>

<form action="{{ route('posts.store') }}" method="post">
    @include('admin.posts._partials.form')
</form>

<a href="{{ url()->previous() }} "class="btn btn-primary ">Voltar</a>
@endsection
