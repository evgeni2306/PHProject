<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"  href="/css/mainPage.css" />
    <title>Главная страница</title>
</head>
<body class="bodybackground">
<main>
    <div class="header">
        <button class='logotipebutton'><a class='ssulka' href="/">Ноды-Ноды</a></button>
    </div>
    <!--    форма входа-->
    <div class='entrform'>
        <button  class ='registration' >Регистрация</button>
        <button  class ='  jirnu' style="  color:white; height: 40px; width: 160px;font-size: 15px;border-color: darkblue;
            background-color: darkblue;margin-left:30px; margin-top: 0px;  transform: translate(0%, -98%);">Вход</button>
        <form action='' method='post' enctype="multipart/form-data">
            <input class='pole entrpole' value ='' style=" margin-top: 0;" type='text' name='name' placeholder="Login">
            <input class='pole entrpole' value ='' type='password' name='password' placeholder="Password"></br>
            <a  href="---" style ='color:white;margin-left: 140px;'>Забыли пароль?</a>
           <input type ='submit' value ='Войти' class ='regformbutton' style="margin-top:30px;">
        </form>
    </div>
    <!--    форма регистрации -->
    <div class='regform hidden'>
        <button  class ='registration jirnu' style="font-weight:0;">Регистрация</button>
        <button  class ='entry'>Вход</button>
        <form action='' method='POST' >
{{--            <input class='pole regpole' value ='' style="margin-top: 0;  " type='text' name='name' placeholder="Ваше имя">--}}
{{--            <input class='pole regpole' value ='' type='text'  name='surname' placeholder="Ваша фамилия">--}}
{{--            <input class='pole regpole' value ='' type='text' name='login' placeholder="Логин">--}}
            <input class='pole regpole' value ='' type='text' id ='email' name='email' placeholder="Почта">
            <input class='pole passpole regpole' value ='' type='password'  id='password' name='password' placeholder="Пароль">
            <input class='pole cnfrmpasspole regpole'  value ='' type='password' name='passwordrepeat' placeholder="Повтор пароля">
            <div class ='msg'></div>
            <input type ='submit' value ='Зарегистрироваться' class ='regformbutton' style="margin-top:20px;">
        </form>
    </div>
</main>
<script src="/js/enterRegisterChange.js"></script>
</body>
</html>
