<?php include "include/config.php" ; 

if(!isset($_SESSION['user'])){
    $datawork->redirect('login');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php include "include/header.php" ; ?>

    <div class="container-fulid pd-5 bg-info">
        <div class="container text-center">
            <h1 class="display-2">Search Any question</h1>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="">
                        <input type="text" size="50" placeholder="Search here" class="form-control shadow form-control-lg border-dark">
                        <input type="submit" value="search" class="btn btn-success btn-lg mt-2 ">
                        <input type="submit" value="View all" class="btn btn-dark btn-lg mt-2 ">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item bg-dark text-white shadow  border border-dark  ">Categories:</a>
                    <a href="" class="list-group-item list-group-item-action border border-success">Technology</a>
                    <a href="" class="list-group-item list-group-item-action border border-success">Movies</a>
                    <a href="" class="list-group-item list-group-item-action border border-success">lifstyle</a>
                    <a href="" class="list-group-item list-group-item-action border border-success">Fitness</a>
                </div>
            </div>
            <div class="col-lg-9">
                <h2 style="color: darkred;">All questions:</h2>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card shadow border-primary border small">
                            <div class="card-header bg-primary text-white">Letest Questions</div>
                            <div class="card-body">
                                <?php 
                            $calling_letest = $datawork->getData("select * from questions JOIN account ON questions.q_by = account.id");
                            foreach($calling_letest as $data):
                                ?>

                                <div class="row">
                                    <div class="col-2"><?= $data['name'];?></div>
                                    <div class="col-7"><a href="view.php?id=<?= $data['id']?>" style="text-decoration: none;color:darkviolet;"><?= $data['q_title'];?></a></div>
                                    <div class="col-3"><?= date("d M Y",strtotime( $data['q_doc']));?></div>
                                </div>
                                
                                <?php endforeach ; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow border border-danger small">
                            <div class="card-header bg-danger text-white">Unanswered Questions</div>
                            <div class="card-body">
                                <?php 
                            $calling_letest = $datawork->getData("select * from questions JOIN account ON questions.q_by = account.id");
                            foreach($calling_letest as $data):
                                ?>

                                <div class="row">
                                    <div class="col-2"><?= $data['name'];?></div>
                                    <div class="col-7"><a href="view.php?id=<?= $data['q_id'];?>" style="text-decoration: none;"><?= $data['q_title'];?></a></div>
                                    <div class="col-3"><?= date("d M Y",strtotime( $data['q_doc']));?></div>
                                </div>
                                
                                
                                <?php endforeach ; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "include/footer.php" ;  ?>
</body>
</html>