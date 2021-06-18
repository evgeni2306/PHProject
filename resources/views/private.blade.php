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
<?require 'html/header.html'?>
    <div class='user-interface'>
        <img class='avatar' src='/images/<? echo $_SESSION['avatar']?>' alt=''>
        <div  class ='user-information'>
            <h1 ><?  echo $_SESSION['name'].' '.$_SESSION['surname']; ?></h1>
            <h2 >День рождения: <? echo $_SESSION['birthday']; ?></h2>
            <h2 >Город: <? echo $_SESSION['city']   ; ?></h2>
        </div>
        <button class='edit'><a style=' text-decoration: none; ' href="pageEditor">Редактировать</a></button>
        <form action="" class='addcomment' method="post" enctype="multipart/form-data">
            <input type="text" class='inptcomment' name="Comment" placeholder="Написать комментарий"/>
            <button class='addcommentbutton' type="submit" >Опубликовать</button>
        </form>
    </div>

    <section>
        <ol class='commentslist'>
        </ol>
    </section>
    <!--    тут будет выводится имя текущего пользователя(нужно для комментариев)-->
    <h1 class='username'><?echo $_SESSION['name'].' '.$_SESSION['surname']; ?></h1>
    @section('content')<!-- секция с постами -->
    <?php
        use  App\Http\Controllers\PostController;
        $pc = new PostController();
        //$allPostsOnPage = $pc.index($_SESSION['id']);//хз как взять ид владельца страницы
    ?>
    @endsection
</main>

</body>
</html>
