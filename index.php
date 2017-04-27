<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<?php require_once('src/MyApp/Db.php'); ?>
<html lang="ru">
<head>
    <title>testinghuesting</title>
    <script src="statick/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="statick/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="statick/bootstrap/dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="statick/main.css">
    <script src="statick/bootstrap/dist/js/bootstrap.js"></script>
    <meta charset="utf-8"/>
</head>
<body>
<div class="panel panel-default">
    <div class="panel-heading">
        Добро пожаловать в чат посвящонный пробкам в Москве и области
    </div>
    <div class="panel-body pre-scrollable" id="#container">
    <?php $db = new \MyApp\Db() ?>
    <?php foreach (array_reverse($db->getLastRecords()) as $message): ?>
        <?php if ($message['id'] % 2 == 0): ?>
            <div class="alert alert-success"><?php echo $message['message'] ?></div>
        <?php else: ?>
            <div class="alert alert-warning"><?php echo $message['message'] ?></div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <div class="panel-heading">
        <center><input id="mess" type="text" style="width: 80%"/>
            <button type="button" id="send">Отправить</button>
        </center>
    </div>
</div>
</body>
<script>
    var conn = new WebSocket('ws://sidimvprobke.com:49181');
    conn.onopen = function (e) {
        $('#container').append("<div class='alert alert-info'>Вы подключились к чату заебали пробки точка ру, материться не воспрещаеться! Приятного общения.</div>");
    };

    conn.onmessage = function (e) {
        $('#container').append("<div class='alert alert-success'>" + e.data + "</div>");
    };

    $('#send').on('click', function () {
        var message = $('#mess').val();
        $('#mess').val('');
        conn.send(message);
        console.log(message);
    });
</script>
</html>
