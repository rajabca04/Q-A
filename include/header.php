 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Feel Free</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <?php 
                $id = $_SESSION['user'];
                
                
                if(isset($_SESSION['user'])):?>
                <li class="nav-item"><a href="#insert" data-bs-toggle="modal" class="nav-link">Ask Question</a></li>
                <li class="nav-item"><a href="signup.php" class="nav-link">Logout</a></li>
                <li class="nav-item"><a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>  <?php echo $id; ?></a></li>
                <?php else:?>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="signup.php" class="nav-link">Ragister</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="modal fade" id="insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="">Title:</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">content:</label>
                                        <textarea rows="10" name="content" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                         
                                        <input type="submit" name="insert" value="INSERT" class="btn btn-success mx-auto">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
    </div>


    <?php
        if(isset($_POST['insert'])){
            $puts = [
                        'q_title' => $_POST['title'],
                        'q_content' => $_POST['content'],
                        'q_by' => $datawork->getuserID(),
                        'q_status' => 1

            ];
            $datawork->insertData('questions',$puts);
        }

        


?>
 