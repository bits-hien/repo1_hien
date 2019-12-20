<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: login.php");
    }
    include "dbconn.php";
    include "human.php";
    $hien = new Human;
    $db1 = new DBconn();
    $db1->connect();
    $table2 = "experience";
    $condition2 = "user_id = " . $_SESSION['id'];
    $experience_hien = $db1->selectAll($table2,$condition2);
    
    

    $table3 = 'education';
    $education_hien = $db1->selectAll($table3,$condition2);

    $table4 = 'skills';
    $skill_hien = $db1->selectAll($table4,$condition2);

    $table5 = 'users';
    $condition3 = "id =".$_SESSION['id'];
    $user_hien = $db1->selectAll($table5,$condition3);
    $user_hien = mysqli_fetch_assoc($user_hien);

    $table6 = 'awards';
    $award_hien = $db1->selectAll($table6,$condition2);

    $table7 = 'presenters';
    $presenters_hien = $db1->selectAll($table7,$condition2);
    

    

    $hien->setExperience($experience_hien);
    $hien->setEducation($education_hien);
    $hien->setSkills($skill_hien);
    $hien->setUsers($user_hien);
    $hien->setAwards($award_hien);
    $hien->setPresenters($presenters_hien);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Thiết kế CV</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="css/cv.css">

    </head>
    <body class="mx-auto mt-5 mb-3 body">
        <header class="container mt-5 mb-2 mx-auto header">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-3">
                            <img src= <?php echo $hien->getUsers()['img'];?> class="rounded-circle float-left bits-img" alt="avatar" width="150px" height="150px">
                        </div>
                        <div class="col-md-9" style="line-height: 10px;">
                            <h2>
                                <?php 
                                    echo $hien->getUsers()['name'];
                                ?>
                            <h2>
                            <h4>
                                <?php 
                                    echo $hien->getUsers()['position'];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>        
                <div class="col-lg-3 flex-column ml-auto">
                    <div class="row">
                        <div class="col-sm-2 icon">
                            <i class="fas fa-phone-square"></i>
                        </div>
                        <div class="col-sm-10 header-fontsize">
                            <p>
                                <?php
                                echo $hien->getUsers()['phone'];
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $hien->getUsers()['phone'];
                                ?>
                            </p>
                        </div> 
                    </div>                    
                    <div class="row">  
                        <div class="col-sm-2 icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-sm-10 header-fontsize">
                            <p><?php echo $hien->getUsers()['email']?></p>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-sm-2 icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="col-sm-10 header-fontsize">
                            <p><?php echo $hien->getUsers()['address']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 flex-column ml-auto">
                    <form action="logout.php" method="POST">
                        <p><input type="submit" name="submit" value="Logout"></p>
                    </form>
                </div>
            </div>           
        </header>
        <div class="row">
            <div class="col-lg-7 flex-column">
                    <h3>EXPERIENCE</h3>
                    <div class="row">
                        <?php
                            foreach ($experience_hien as $value) {
                                // while($value = mysqli_fetch_assoc($experience_hien)) {
                        ?>  
                                <div class="col-md-3"><?php echo $value["time"] ?></div>
                                <div class="col-md-9">
                                    <p><b><?php echo $value["company_name"]?></b></p>
                                    <?php echo $value["position"]?>
                                    <p><?php echo $value["work_content"]?></p>
                                </div>
                        <?php }
                        ?>
                    </div>
                <div>
                    <h3>EDUCATION</h3>
                    <div class="row">
                        <?php
                            foreach($hien->getEducation() as $value){  
                        ?>
                        <div class="col-md-3"><?php echo $value['time']?></div>
                        <div class="col-md-9">
                            <p><b><?php echo $value['school_name']?></b></p>
                            <?php echo $value['specialized']?>
                            <p><?php echo $value['content']?></p>
                        </div>
                            <?php } 
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 flex-column">
                <div>
                    <h3>PROFILE</h3>
                    <p><?= $hien->getUsers()['profile']; ?></p>
                </div>
                <div class="mt-5">
                    <h3>SKILLS</h3>
                    <div>
                        <?php
                            foreach($hien->getSkills() as $value){  
                        ?>
                            <div>
                                <h7><?php echo $value['skill'] ?></h7>
                                <div class="progress">
                                    <div class="progress-bar w-<?php echo $value['level'] ?>"></div>
                                </div>
                            </div>
                            <?php }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row mt-3 p-1">
            <div class="col-xl-4">
                <h3>AWARDS</h3>
                <div class="flex-column ml-auto mt-1">
                        <?php
                            foreach($hien->getAwards() as $value){
                        ?>
                        <p><b><?php echo $value['prize']?></b></p>
                        <p><?php echo $value['content']?></p>
                        <p><?php echo $value['content']?></p>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="col-xl-4">
                <h3>REFERENCES</h3>
                <div class="flex-column ml-auto mt-1">
                    <div>
                        <?php
                            foreach($hien->getPresenters() as $value){
                        ?>
                            <p><b><?php echo $value['name']?></b></p>
                            <div class="row">
                                <div class="col-sm-2"><b>Phone</b></div>
                                <div class="col-sm-10">
                                    <?php echo $value['phone']?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Email</b></div>
                                <div class="col-sm-10">
                                    <?php echo $value['email']?>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <h3>INTEREST</h3>
                <img src="anh/1.PNG" class="mt-5" width="300px" height="ml-auto">
            </div>
        </footer>
        <form action="logout.php" method="POST">
                <p><input type="submit" name="submit" value="Logout"></p>
        </form>
    </body>
</html>
