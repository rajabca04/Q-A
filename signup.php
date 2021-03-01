<?php include "include/config.php"; 

if(isset($_SESSION['user'])){
    $datawork->redirect('login');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expanda-lg navbar-dark bg-info">
    <div class="container">
        <div class="navbar-brand mx-auto">signup</div>
    </div>
</nav>

<div class="container mt-3">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">name:</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter email" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">password:</label>
                                <input type="text" name="password" placeholder="Enter strong password" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">contact:</label>
                                <input type="text" name="contact" placeholder="Enter contact no." class="form-control">
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="signup" value="signup" class="btn btn-success w-100">
                            </div>
                        </form>

                        <?php 
                            if(isset($_POST['signup'])){
                                $put = [
                                    'name' => $_POST['name'],
                                    'email' => $_POST['email'],
                                    'password' => sha1($_POST['password']),
                                    'contact' => $_POST['contact']
                                ];
                                $datawork ->insertData("account",$put);     
                            }
                             



                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>