<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" method="POST" action="/register">
        {{csrf_field()}}
        <h2 class="form-signin-heading">Please Register Here</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="4-50 Characters" required autofocus>
        <label for="inputEmail">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" required>
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" id="phone" class="form-control" required>
        <label for="inputPassword">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="6-20 Characters"
               required>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="6-20 Characters"
               required autofocus>
        <label for="address">Home Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Less Than 200 Characters"
               required>

        @include('layout.error')
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

</div> <!-- /container -->

</body>
</html>
