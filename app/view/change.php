 <html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200;300;400;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="style.css">
</head>

<body>
<?php 
 echo $reslt;

?>

 
 <form class="login" action="" method="post">
<h4 class="text-center">  Change Password</h4>

<div class="form-group ">
  <label for="">email</label>
  <input type="text"
    class="form-control input-lg" name="email" id="" aria-describedby="helpId" placeholder="User email" autocomplete="off">
</div>
<div class="form-group ">
  <label for="">Old Password</label>
  <input type="password"
    class="form-control  input-lg" name="password" id="" aria-describedby="helpId" placeholder="Password" autocomplete="new-password">
</div>
<div class="form-group ">
  <label for="">New Password</label>
  <input type="password"
    class="form-control  input-lg" name="password2" id="" aria-describedby="helpId" placeholder="Password" autocomplete="new-password">
</div>
<span><a href="restPass.php">
Forget Password</a></span>
<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

</form>
</body>
</html>

