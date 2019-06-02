<?php
$db = @mysqli_connect('127.0.0.1', 'root', '', 'guestbook') or
die ('Error Data Base connection');
if(!$db) die(mysqli_connect_error());

mysqli_set_charset($db, 'utf8') or die ('Error Data Base charset setting');
