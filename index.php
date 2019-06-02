<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'connect.php';
require_once 'funcs.php';



if (!empty($_POST)) {
    saveMessage();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
$messages = getMessage();
//$messages = stringToArray($messages);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Book</title>
</head>
<body>
<form action="index.php" method="post">
    <p>
        <label for="name">Name:</label> <br>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="message">Text:</label> <br>
        <textarea name="message" id="message">
        </textarea>
    </p>
    <button type="submit">Send</button>
</form>
<hr>
<?php if(!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <div style="border: 1px solid black; border-radius: 5px; width: 30%; margin-top: 10px;">
            <span>User: <? echo $message['name']?> | Date: <? echo $message['date'] ?></span>
            <div><?=nl2br(htmlspecialchars($message['message']))?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
