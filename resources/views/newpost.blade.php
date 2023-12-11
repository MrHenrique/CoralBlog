@extends('master')

@section('header-intro')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-black text-uppercase text-weight-bold fs-1 title-page">Nova Postagem</h1>
            <p class="fs-5 text-uppercase" style="color:hotpink">Olá {{ auth()->user()->fullName }}</p>
            <div class="container" style="width: 85%">
                <hr>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <form style="
            margin: 0 auto;
            width:80%;" action="{{ route('newpost') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <label for="title" style="margin: 3px">Digite o título do novo post</label>
            <input type="text" class="form-control" id="title" name='title'>
            <label for="content" style="margin: 3px">Digite o conteúdo do novo post.</label>
            <textarea class="form-control" id="content" rows="6" name="content"></textarea>
            <input type="file" class="form-control-file" id="thumb" name="thumb" style="margin: 6px">
            <button class="comment-buttom" type="submit" style="margin: 6px">Salvar</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('error_create_comment'))
                <span>{{ session()->get('error_create_comment') }}</span>
            @endif
        </form>
    </div>
@endsection
