<?php include "include/config.php";
//     if(isset($_SESSION['user'])){
//     $datawork->redirect();
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expanda-lg navbar-dark bg-info">
    <div class="container">
        <div class="navbar-brand mx-auto">Login</div>
        <a href="index.php" class="navbar-link">Home</a>
    </div>
</nav>

<div class="container mt-3">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">user_name:</label>
                                <input type="text" name="user_name" placeholder="Enter user name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">password:</label>
                                <input type="password" name="password" placeholder="Enter user name" class="form-control">
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="login" value="Login" class="btn btn-success w-100">
                            </div>
                        </form>
                        <?php 
                            
                            if(isset($_POST['login'])){
                                $email = $_POST['user_name'];
                                $password = sha1($_POST['password']);

                                $check = $datawork -> countData("SELECT * FROM account WHERE email = '$email' AND password = '$password'");

                                if($check > 0){
                                    $_SESSION['user'] = $email;
                                    $datawork->redirect();

                                }
                                else{
                                    echo "faild";
                                }

                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include "include/footer.php";?>
    
     
</body>
</html>