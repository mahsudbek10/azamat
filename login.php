<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start ();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['email'],$_POST['pass'])){
        if(htmlspecialchars($_POST['email']) === "aza@gmail.com" && htmlspecialchars($_POST['pass'])=="123"){
            $_SESSION['auth'] = true;
        } else $_SESSION['err']="Hеверный логин или пароль";
//        var_dump($_POST);
    }    
}
?>
<?php if(!isset($_SESSION['auth'])): ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="row">
<div class="col-md-3"></div>
<form action="" method="post" class="col-md-3">
    <?php if(isset($_SESSION['err'])) { echo "<span class='text-danger'>".$_SESSION['err']."</span>"; unset($_SESSION['err']); }?>
    <br>Login <input type="email" class="form-control" name="email"/><hr>
    password <input type="password" class="form-control" name="pass"/><hr>
    <button type="submit" class="btn btn-success">Войти</button>
</form>
</div>
<?php else: 
     header("Location: admin/index");
?>

<?php endif; ?>
