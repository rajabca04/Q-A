<?php include "include/config.php" ; 
;
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

     

    <div class="container-fluid mt-5">
        <div class="row">
             
            <div class="col-lg-12 ">
                

                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card shadow border-primary border small">
                             
                            <div class="card-body">
                                <?php 
                            $search = $_GET['search'];
                            $calling_letest = $datawork->getData("select * from questions JOIN account ON questions.q_by = account.id where questions.q_title LIKE '%$search%'");
                            foreach($calling_letest as $data):
                                ?>

                                <div class="row">
                                    <div class="col-2"><?= $data['name'];?></div>
                                    <div class="col-7"><a href="view.php?id=<?= $data['q_id']?>" style="text-decoration: none;color:darkviolet;"><?= $data['q_title'];?></a></div>
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