<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>

    <div>
        <div id="img-login"><h1 class="model-h1">BANGKU <label>Sumbang Buku</label> </h1>
        <img src="img/logo.png" style="width: 40%; height: 70%;position: fixed; margin-left: 5%"> </div>

        <div class="login">
         <div class="kotak model-form" >

        <form class="login-form" action="fungsi/proses.php" method="post" onsubmit="validasi()">

            <h1> Login </h1>
            <div align="center">
            <img style="width: 30%; height: 30%;" src="img/Default%20User.png">
            </div>
            <div class="alert"><?php if($_SESSION['pesan']!=""){
                    echo $_SESSION['pesan'];
                }?>
            </div>
            <input type="text" name="username" placeholder="Username">

            <input type="password" name="password" placeholder="Password">
            <br>
            <div align="center">
            <button type="submit" name="login" value="login" class="bt bt-birusoft" style="float: left;margin-left: 14%"> login </button>
            </div>

        </form>
        <a href="register.php"><button  class="bt bt-birusoft" style="float: left; margin-left: 10%"> Register</button></a>
    </div>
</div>

</body>

<!--untuk validasi form login-->
<!--<script type="text/javascript">-->
<!--    var validasi= function () {-->
<!--        alert ('yes ')-->
<!--    }-->
<!---->
<!--</script>-->
</html>

<?php
$_SESSION['pesan']="";
?>