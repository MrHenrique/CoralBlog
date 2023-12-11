@extends('master')
@section('header-intro')
    @if (auth()->guest())
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="text-black text-uppercase text-weight-bold fs-1 title-page">Login</h1>
                <p class="fs-5 text-uppercase" style="color:hotpink">Faça o login abaixo.</p>
                <div class="container" style="width: 85%">
                    <hr>
                </div>
            </div>
        @else
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="text-black text-uppercase text-weight-bold fs-1 title-page">Olá </h1>
                    <p class="fs-5 text-uppercase" style="color:hotpink">{{ auth()->user()->fullName }}.</p>
                    <div class="container" style="width: 85%">
                        <hr>
                    </div>
                </div>
    @endif
@endsection

@section('main') @if (auth()->guest())
    <div class="text-center">
        <form class="search-bar" action="{{ route('login') }}" method="post">
            @csrf
            {{ $errors->first('email') }}
            <span class="text-black text-uppercase text-weight-bold">Login  </span><input type="text" name="email" placeholder="e-mail" value="nbatz@example.com"
                class="search-bar text-center" />
            <br><br>
            {{ $errors->first('password') }}
            <span class="text-black text-uppercase text-weight-bold">Senha  </span><input type="password" name="password" placeholder="senha" class="search-bar text-center"
                value="123" />
            <br><br>
            <button type="submit" class="text-black search-button">Entrar</button>
        </form>
        @if (session()->has('error_login'))
            {{ session()->get('error_login') }}
        @endif
    </div>
@else
    <div class="container text-center" style="min-height: 100%">
        <h1 class="text-grey text-uppercase fw-bold">Você já está logado(a).</h1>
    </div>
@endif
@endsection
