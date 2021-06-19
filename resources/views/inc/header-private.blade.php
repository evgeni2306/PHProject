<div class='header'>
    @if(Auth::check())
        <button class='header-button mystr-button'><a style=' text-decoration: none; ' href="{{route('user.private')}}">
                Моя страница</a></button>
        <button class='header-button search-button'><a style=' text-decoration: none; '
                                                       href="{{route('search-page')}}">Поиск</a></button>
        <button class='header-button exit-button'><a style=' text-decoration: none; ' href="{{route('user.logout')}}">Выход</a>
        </button>
    @endif
    @if(!Auth::check())
        <button class='header-button mystr-button'><a style='text-decoration: none;'
                                                      href="{{route('user.registration')}}">
                Регистрация</a></button>
        <button class='header-button search-button'><a style=' text-decoration: none; ' href="{{route('search-page')}}">Поиск</a>
        </button>
        <button class='header-button exit-button'><a style=' text-decoration: none; ' href="{{route('user.login')}}">Вход</a>
        </button>
    @endif
</div>
