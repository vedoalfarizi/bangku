<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body class="login">

<div class="login-kiri">
    <div class="kotak model-form">

        <form class="login-form" action="" method="post" onsubmit="validasi()">

            <h1> Login </h1>
            <img class="img-bulat" src="img/coba.jpeg">
            <br>
            <input type="text" name="username" placeholder="Username">

            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="login" value="login" class="bt bt-biru"> login </button>
        </form>
    </div>
</div>

</body>

<script type="text/javascript">
    var validasi= function () {
        alert ('yes ')
    }

</script>
</html>