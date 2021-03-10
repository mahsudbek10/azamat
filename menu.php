<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start ();
if(!isset($_SESSION['auth']))    header("Location: index");
?>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-3"></div>
<div class="col-sm-3">
    <a href="login">МЕНЮ</a><br>
    <a href="?type=1">Полезные ссылки</a><br>
    <a href="announ?type=2">Школа</a><br>
    <a href="announ?type=3">Новости</a><br>
    <a href="announ?type=4">Объявления</a><br>
</div>
</div>
