<!DOCTYPE html>
<?php

include 'sqli_conn.php';

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['emai;'];
    $password = $_POST['password'];
    
    $var = "SELECT * FROM karyawan WHERE email='$email' AND password='$password'";
    $hasil = $conn -> query($var);

    if ($hasil->num_rows > 0) {
        $baris = mysqli_fetch_assoc($hasil);
        $_SESSION['name'] = $baris['name'];
        header("Location: halaman_admin.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }

}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid">
        <div class="logo mt-5 d-lg-block d-none">
            <img src="src/img/logo-black.png" width="130px">
        </div>
        <div class="row">
            

        </div>
		<div class="row">
			<div class="col-lg-6 col-md-10 form-container">
				<div class="col-lg-6 col-md-12 col-sm-9 col-xs-12 form-box">
                    <div class="image-container2">
                        <img class="img-fluid d-none d-md-block d-lg-none loginimg2" src="src/img/login-tablet.png" alt="">
                    </div>
                    <div class="logo-phone mt-5 d-md-none d-block">
                        <img src="src/img/logo-phone-black.png" width="88px">
                    </div>					
                    <div class="heading mb-3 text-md-center text-center">
                      <h2>Welcome Back</h2>
                        <p>
                            Please fill your detail to access your account.
                        </p>
                    </div>
                    <form method="POST" action="login.php">
                        <div>
                            <label for="">Email</label>
                            <div class="form-input">
                                <span><i class="fa fa-times-circle-o"></i></i></span>
                                <input type="email" id="email" name="email" placeholder="Email Address" required>
                            </div>
                        </div>
						
                        <div>
                            <label for="">Password</label>
                            <div class="form-input">
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                <span><i class="fa fa-eye-slash"></i></span>
                            </div>
                        </div>
						
						<div class="row mb-3">
							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label" for="cb1">Remember me</label>
								</div>
							</div>
							<div class="col-6 text-end">
								<a href="forget.html" class="forget-link">Forget password?</a>
							</div>
						</div>
						<div class="text-center mb-3">
							<button type="submit" name="submit" class="btn">Sign In</button>
						</div>
					</form>
				</div>
			</div>

			<div class="image-container col-lg-5 col-md-none d-none d-lg-block" style="margin: auto;"></div>
		</div>
        
	</div>
    
</body>
</html>