<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer</title>
    <style media="screen">
    body{
    background: #abbaab;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }
    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Login Customer</h4>
            </div>
            <div class="card-body">
                <form action="proses_login_customer.php" method="post">
                    Username
                    <input type="text" name="username" class="form-control" required />
                    Password
                    <input type="password" name="password" class="form-control" required />
                    <button type="submit" name="login_customer" class="btn btn-block btn-dark"> Login </button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
