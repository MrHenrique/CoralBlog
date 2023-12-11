@extends('master')

@section('header-intro')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-black text-uppercase text-weight-bold fs-1 title-page">{{ $post->title }}</h1>
            <p class="fs-5 text-grey text-uppercase" style="color:hotpink;font-size:13px">
                {{ date('d/m/y', strtotime($post->created_at)) }} por
                {{ $post->user->fullName }}
            </p>
            <div class="container" style="width: 85%">
                <hr>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div id="content-post" class="container" style="width: 700px;text-align:justify">
        <img src="{{ $post->thumb }}" class="img-fluid" width="700px" height="auto" />
        <br><br>
        <p style="font-size: large">{{ $post->content }}</p>

        <br><br>

        @if ((auth()->check() && auth()->user()->id === $post->user_id) || (auth()->check() && auth()->user()->admin === 1))
            <div style="text-align:right">
                <a class="text-black text-uppercase fw-bold text-decoration-underline mt-auto"
                    href="{{ route('post.destroy', $post->id) }}">Apagar Postagem</a>
            </div>
        @endif
        <hr>
        <br>

        <br>
        <p class="comment-number">Comentários ({{ $post->comments->count() }})</p>
        <ul id="comments" class="px-5">
            @forelse($post->comments as $comment)
                <li>{{ $comment->comment }}</li>
                <div class="comment-person-container">
                    <p class="comment-person px-2">{{ $comment->user->fullName }} -
                        {{ date('d/m/y', strtotime($comment->created_at)) }}
                        @if ((auth()->check() && auth()->user()->id === $comment->user->id) || (auth()->check() && auth()->user()->admin === 1))
                            <a class="text-black text-uppercase fw-bold text-decoration-underline mt-auto"
                                href="{{ route('comment.destroy', $comment->id) }}">Apagar</a>
                        @endif
                    </p>
                </div>

            @empty
                <p class="no-comment">Seja o primeiro(a) a comentar.</p>
            @endforelse
        </ul><br><br>
        @if (auth()->check())
            <form class="comment-form" action="{{ route('comment', $post->id) }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea class="comment-text-area" name="comment" placeholder="Digite seu comentário aqui..."></textarea>
                <button class="comment-buttom" type="submit">Comentar</button>
                <p>{{ $errors->first('comment') }}</p>
                @if (session()->has('error_create_comment'))
                    <span>{{ session()->get('error_create_comment') }}</span>
                @endif
            </form>
        @else
            <form class="comment-form" action="{{ route('comment') }}" method="post">
                @csrf
                <textarea class="comment-text-area" name="comment" placeholder="Faça login para comentar..." disabled></textarea>
                <button class="comment-buttom" type="submit" disabled>Comentar</button>
            </form>
            <br><br>
    </div>
    @endif
@endsection
