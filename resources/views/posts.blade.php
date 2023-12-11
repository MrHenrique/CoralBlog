@extends('master')

@section('header-intro')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-black text-uppercase text-weight-bold fs-1 title-page">Todos os posts</h1>
            <p class="fs-5 text-uppercase" style="color:hotpink">Total ({{ $posts->total() }})</p>
            <div class="container" style="width: 85%">
                <hr>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <section class="text-center">
            <div class="posts">
                @forelse ($posts as $post)
                    <div class="col-lg-4 col-md-12 mb-4 post">
                        <br>
                        <div class="card mb-3 bg-white" style="min-height:450px;max-height: 450px; height:450px">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ $post->thumb }}" class="img-fluid"
                                    style="min-height:350px;max-height: 350px;height:350px" />
                                <a href="{{ route('post', $post->slug) }}">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="card-content flex-grow-1">
                                    <h5 class="card-title text-black text-uppercase fw-bold">
                                        {{ Str::limit($post->title, 29, '...') }}</h5>
                                    <p class="lh-1 fst-italic" style="color:hotpink;font-size:13px">
                                        {{ date('d/m/y', strtotime($post->created_at)) }} por
                                        {{ $post->user->fullName }}
                                    </p>
                                    <p class="card-text fs-6 fw-lighter flex-grow-1">
                                        @if ($loop->first)
                                            {{ Str::limit($post->content, 50, ' ... ') }}
                                        @else
                                            {{ Str::limit($post->content, 30, ' ... ') }}
                                        @endif
                                    </p>
                                </div>
                                <a href="{{ route('post', $post->slug) }}"
                                    class="text-black text-uppercase fw-bold text-decoration-underline mt-auto"
                                    style="color:hotpink">Leia mais</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container" style="min-height: 100%">
                        <h1 class="text-grey text-uppercase fw-bold">Nenhuma postagem encontrada.</h1>
                    </div>
                @endforelse
            </div>
            <div class="d-flex">
                <div class="mx-auto mt-3">
                    {{ $posts->links() }}
                </div>

            </div>
        </section>
    </div>
@endsection
