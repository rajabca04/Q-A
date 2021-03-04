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


    <?php
        $id = $_GET['id'];
        $value = $datawork->getData("select * from questions where q_id='$id'");
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h3>All Questions</h3></div>
                    <div class="card-body">
                    <h2> Qus:- <?= $value[0]['q_title'];?></h2>
                    <?php
                                
                                $id = $_GET['id'];
                                $callingAns = $datawork->getData("select * from answers JOIN account ON account.id = answers.answer_by where q_id = '$id'");
                                foreach($callingAns as $ans): 
                                ?>

                                    
                                    <a href="#" class="list-group-item list-group-item-action border-dark" >
                                        <div class="d-flex w-100 ">
                                        <h5 class="mb-1"><?=$ans['name'];?></h5>
                                        <small><?= date("D d M ",strtotime( $ans['answer_doc']));?></small>
                                        </div>
                                        <p class="mb-1"><?= $ans['a_content'];?></p>
                                         
                                    </a>
                                    
                                    
                                </div>

                                <?php endforeach ;  ?>

                                    <?php if(isset($_SESSION['user'])):?>



                                <form action="" method="post">
                                    <div class="mb-3">
                                        <input type="text" placeholder="Write your answer..." name ="content" class="form-control border-success">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="send_ans" value="Submit answer"class="btn btn-success float-end ">
                                    </div>

                                </form>

                                <?php

                                    if(isset($_POST['send_ans'])){
                                        $data = [
                                            'answer_by' => $datawork->getuserID(),
                                            'q_id' => $_GET['id'],
                                            'a_content' => $_POST['content']

                                        ];

                                        $datawork->insertData('answers',$data,'view.php?id='.$_GET['id']);

                                        // $datawork->redirect('view');
                                    }



                                ?>

                                <?php else: ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="text-muted p-3">Login for Give an answer of this questions</h2>
                                        </div>
                                    </div>
                                    <?php endif ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
                  
                     
               
            
                
         
                
                 
             
            
     
 
    <?php include "include/footer.php" ;  ?>
</body>
</html>