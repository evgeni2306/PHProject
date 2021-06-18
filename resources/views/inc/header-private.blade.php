<div class='header'>
    <? if(Auth::check()){?>
    <button class='header-button mystr-button'><a style=' text-decoration: none; ' href="private">
            Моя страница</a></button>
    <button class='header-button search-button'><a style=' text-decoration: none; ' href="">Поиск</a></button>
    <button class='header-button exit-button'><a style=' text-decoration: none; ' href="/logout">Выход</a></button>
    <?}?>
    <? if(!Auth::check()){?>
    <button class='header-button mystr-button'><a style=' text-decoration: none; ' href="registration">
            Регистрация</a></button>
    <button class='header-button search-button'><a style=' text-decoration: none; ' href="">Поиск</a></button>
    <button class='header-button exit-button'><a style=' text-decoration: none; ' href="/login">Вход</a></button>
    <?}?>
</div>
