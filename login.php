<?php

require_once "core/init.php";

//validasi register
if(isset($_POST['submit'])){
    $nama =$_POST['username'];
    $pass =$_POST['password'];

    if(!empty(trim($nama)) && !empty(trim($pass))) {
        
       if (cek_data($nama,$pass)){
        $_SESSION ['user']=$nama;
        header('location:index.html');
       }else{
        echo 'Username atau Password salah';
       }

    }else{
        echo'tidak boleh kosong';
    }
}
require_once "view/header.php";

?>

<form action="login.php" method="post">
    <label for="">Username</label> <br>
    <input type="text" placeholder="Username" name="username"> <br><br>

    <label for="">Password</label> <br>
    <input type="password" placeholder="Password" name="password"> <br><br>

    <input type="submit" name="submit" value="Login">
</form>

<?php

require_once "view/footer.php";
?>