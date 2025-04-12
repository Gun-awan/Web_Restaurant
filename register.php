<?php

require_once "core/init.php";

//validasi register
if(isset($_POST['submit'])){
    $nama =$_POST['username'];
    $pass =$_POST['password'];

    if(!empty(trim($nama)) && !empty(trim($pass))) {
        
        //Input Database
        if (register_user($nama,$pass)){
            echo 'Daftar Akun Berhasil';     
        }else{
            echo 'Username Sudah Digunakan';
         }

    }else{
        echo'tidak boleh kosong';
    }
}

require_once "view/header.php";

?>

<form action="register.php" method="post">
    <label for="">Username</label> <br>
    <input type="text" placeholder="Username" name="username"> <br><br>

    <label for="">Password</label> <br>
    <input type="password" placeholder="Password" name="password"> <br><br>

    <input type="submit" name="submit" value="daftar">
</form>

<?php

require_once "view/footer.php";

?>