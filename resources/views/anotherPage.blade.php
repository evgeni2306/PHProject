<!DOCTYPE html>
<?// session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"  href="/css/pageAndEditor.css" />

    <title>Главная страница</title>
</head>
<body>
<main>
    <?require 'html/header.html';
    use App\Http\Controllers\PostController;?>
    <div class='user-interface'>
        <img class='avatar' src='/images/<? echo $_SESSION['anotherAvatar']?>' alt=''>
        <div  class ='user-information'>
            <h1 ><?  echo $_SESSION['anotherName'].' '.$_SESSION['anotherSurname']; ?></h1>
            <h2 >День рождения: <? echo $_SESSION['anotherBirthday']; ?></h2>
            <h2 >Город: <? echo $_SESSION['anotherCity']   ; ?></h2>
        </div>
        <? if(Auth::check()){?>
        <form action="{{route('user.post.create')}}" class='addcomment' method="post" enctype="multipart/form-data">
            <input type="text" class='inptcomment' name="text" placeholder="Написать комментарий"/>
            @csrf<input type="hidden" name='creatorId' value="<?echo $_SESSION['id']?>">
            @csrf<input type="hidden" name='ownerId' value="<?echo $_SESSION['anotherId']?>">
            <button class='addcommentbutton' type="submit" >Опубликовать</button>
        </form><?}?>
    </div>
    <?php $comments = PostController::index($_SESSION['anotherId'])?>
    <section>
        <ol class='commentslist'>

        @foreach($comments as $comment)
            <li>
            @if($_SESSION['id'] != $comment->CreatorId)
            {{$comment->Text}}<br>                          
            @endif

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
            Лайки: {{ $comment->Likes }}<br>
            </li>
        @endforeach
        <?php echo $comments->render(); ?>
        </ol>
    </section>
    <!--    тут будет выводится имя текущего пользователя(нужно для комментариев)-->
        <? if(Auth::check()){?>
    <h1 class='username'><?echo $_SESSION['name'].' '.$_SESSION['surname']; ?></h1><?}?>
</main>

</body>
</html>
