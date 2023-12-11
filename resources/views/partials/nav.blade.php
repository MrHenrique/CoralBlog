<div class="container-fluid">
    <a href="{{ route('home') }}"><img class="navbar-brand" src="{{ URL::asset('images/thumbnail_IMG_4608.png') }}"
            height="auto" width="50px" style="object-fit: contain;"></a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" style="color:whitesmoke"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <form class="d-flex nav-link search-bar" action="{{ route('search') }}" method="get">
                    <input type='text' name='s' placeholder="Buscar post"
                        class="form-control hidden search-bar" value="{{ request()->input('s') ?? '' }}">
                    <button type="button" class="search-button"><i class="fas fa-search"></i></button>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link text-uppercase" aria-current="page" href="{{ route('home') }}">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="{{ route('posts') }}" rel="nofollow">Posts</a>
            </li>
            @if (auth()->check() && auth()->user()->admin === 1)
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('newpost') }}">Criar Post</a>
                </li>
            @endif
            @if (auth()->guest())
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('login') }}">Login</a>
                </li>
        </ul>
    @else
        <li class="nav-item">
            <a class="nav-link text-uppercase">{{ auth()->user()->fullName }}</a>
        </li>
        <li class="nav-item">
            <a class="logout-buttom nav-link text-uppercase" href="{{ route('logout') }}">Sair</a>
        </li>
        </ul>
        @endif

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchClicked = false;
        var form = document.querySelector('.search-bar');

        document.querySelector('.search-button').addEventListener('click', function() {
            if (!searchClicked) {
                document.querySelector('.search-bar input').classList.remove('hidden');
                searchClicked = true;
            } else {
                form.submit();
            }
        });
    });
</script>
<style>
    .hidden {
        display: none;
    }
</style>
