<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width+device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
    <style media="screen">
      body{
        background: #abbaab;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<title>Login Page</title>
    	<style>
    .html,body{
    background-image: url('hh.jpeg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif; */
    }

    .container{
    height: 100%;
    align-content: center;
    }

    .card{
    height: 370px;
    margin-top: auto;
    margin-bottom: auto;
    width: 400px;
    background-color: rgba(0,0,0,0.5);
    }

    .input-group-prepend span{
    width: 50px;
    background-color: #FFC312;
    color: black;
    border:0 !important;
    }

    .fonta{
    	font-family: "Courier New";
      text-align: center;

    }
    </style>

    	<!--Bootsrap 4 CDN-->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    	<!--Custom styles-->
    	<link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <div class="container">
    	<div class="d-flex justify-content-center h-100">
    		<div class="card">
    			<div class="card-header">
    				<h3 class="fonta" align="center">Login Admin
    			</div>
          <div class="card-body">
                <form action="proses_login_admin.php" method="post">
                    Username
                    <input type="text" name="username" class="form-control" required />
                    Password
                    <input type="password" name="password" class="form-control" required />
                    <button type="submit" name="login_admin" class="btn btn-block btn-dark"> Login </button>
                  </form>
                  <button class="btn btn-block btn-dark">
                    <a href="tampilan_awal.php">kembali</a>
                   </button>
            </div>
    			</div>
    		</div>
    	</div>
    </div>
    </body>
</html>
