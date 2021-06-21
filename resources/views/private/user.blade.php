@extends('layouts.app')
@section('title'){{'Моя страница'}}@endsection
@section('content')
    @include('inc.header-private')
    @include('inc.messages')
    <div class='user-interface'>
        <img class='avatar' src='/images/<?

use App\Http\Controllers\PostController;

echo $_SESSION['avatar']?>' alt=''>
        <div class='user-information'>
            <h1><?  echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></h1>
            <h2>День рождения: <? echo $_SESSION['birthday']; ?></h2>
            <h2>Город: <? echo $_SESSION['city']; ?></h2>
        </div>
        <button class='edit'><a style=' text-decoration: none; ' href="pageEditor">Редактировать</a></button>
        
        <form action="{{route('user.post.create')}}" class='addcomment' method="post" enctype="multipart/form-data">
        @csrf<input type="text" class='inptcomment' name="text" placeholder="Написать комментарий"/>
        @csrf<input type="hidden" name='creatorId' value="<?echo $_SESSION['id']?>">
        @csrf<input type="hidden" name='ownerId' value="<?echo $_SESSION['id']?>">
            <button class='addcommentbutton' type="submit">Опубликовать</button>
        </form>
    </div>
    <?php $comments = PostController::index($_SESSION['id'])?>
    <section>
        <ol class='commentslist'>
        
        @foreach($comments as $comment)
            <li>
            <!--ДЛЯ ОСТАЛЬНЫХ -->
            @if($_SESSION['id'] != $comment->CreatorId)

            {{$comment->Text}}<br>  
            
            <form action="{{route('user.post.delete')}}" class='deletecomment' method="post" enctype="multipart/form-data">
            @csrf<input type="hidden" name='id' value="<?echo $comment->id?>">
            <button class='deletecommentbutton' type="submit">Удалить</button>
            </form><br> 
            @endif

            <!--ДЛЯ АВТОРА КОММЕНТА -->

            @if($_SESSION['id'] == $comment->CreatorId)
            <form action="{{route('user.post.edit')}}" method="post" enctype="multipart/form-data">
            @csrf<input type="text" name='text' value="<?echo $comment->Text?>">
            @csrf<input type="hidden" name='postId' value="<?echo $comment->id?>">
            <button class='editcommentbutton' type="submit">Редактировать</button>
            </form>

            <form action="{{route('user.post.delete')}}" class='deletecomment' method="post" enctype="multipart/form-data">
            @csrf<input type="hidden" name='id' value="<?echo $comment->id?>">
            <button class='deletecommentbutton' type="submit">Удалить</button>
            </form><br>

            @endif

            Автор: {{ $comment->name }}<br> 
            Лайки: {{ $comment->Likes }}
            </li>
        @endforeach
        
        </ol>
    </section>
    <!--    тут будет выводится имя текущего пользователя(нужно для комментариев)-->
    <h1 class='username'><?echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></h1>
@endsection
