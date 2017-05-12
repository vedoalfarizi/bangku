<?php
    session_start();
    if($_SESSION['pesan']==null){
        echo "";    }
    else{
    echo $_SESSION['pesan'];
    }

    if(isset($_SESSION['id'])){
        if($_SESSION['jenis']==1){
            header('location:umum/beranda_umum.php');
        }else{
            header('location:org/beranda.php');
        }
    }
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
        <img src="img/Logo.png" style="width: 20%; height: 40%;position: fixed; margin-left: 15%;margin-top:7%; "
             class="animasi sorot"> </div>

        <div class="login">
         <div class="kotak model-form" >

        <form class="login-form" action="fungsi/proses.php" method="post" onsubmit="validasi()">

            <h1> Login </h1>
            <div align="center">
            <img style="width: 30%; height: 30%;" src="img/default_user.png">
            </div>
            <?php if($_SESSION['pesan']!=""){
                echo "<div class='alert'>".$_SESSION['pesan']."</div>";
            }?>
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