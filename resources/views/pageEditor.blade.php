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
        <form action="" method="post" enctype="multipart/form-data">
            <h3 style='margin-left:250px;'>Редактирование профиля</h3><br>
            <input value='' class='inpttext' type='text' name='fName' placeholder="Введите имя"/><br>
            <input value='' class='inpttext' type='text' name='lName' placeholder="Введите фамилию"><br>
            <input value='' class='inpttext' type='date' name='birth' placeholder="Укажите дату рождения"><br>
            <input value='' class='inpttext' type='text' name='city' placeholder="Укажите город"><br>
            <input type="file" class='inpttext' name="Avatar"/><br/>
            <input class='inpttext' type='submit' value='Сохранить'>
        </form>
    </div>
</main>
</body>
</html>
