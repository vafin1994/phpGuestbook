<?php
function clear()
{
    global $db;
    foreach ($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}

function saveMessage()
{
    global $db;
    clear();
    extract($_POST);
    $query = "INSERT INTO guestbook (name, message) VALUES ('$name', '$message')";
    mysqli_query($db, $query);
}

function getMessage()
{
    global $db;
    $query = "SELECT * FROM `guestbook` ORDER BY `date`";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}


function printArray($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}

