<!DOCTYPE html>
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
        <img class='avatar' src='/images/avatar.jpg' alt=''>
        <div  class ='user-information'>
            <h1 >имя фамилия</h1>
            <h2 >День рождения: дата</h2>
            <h2 >Город: город</h2>
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
    <h1 class='username'>Вася228</h1>
</main>
<script src="/js/addComment.js"></script>
</body>
</html>