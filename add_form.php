<?php
    require('connectdb.php');

    session_start();

    $error = false;
    $required = array('fname', 'lname', 'gender', 'skill');
    $_SESSION['errtxt'] = array("Errfname" => '', "Errlname" => '', "Errgender" => '' , "Errskill" => '');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($required as $formvalue){
            if(empty($_POST[$formvalue])){
                $error = true;
                $_SESSION['errtxt']["Err" . $formvalue] = "* " . $formvalue . ' is required';
            }else{
                $_SESSION['errtxt']["Err" . $formvalue] = '';

            }
        }
        
        if(!$error){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $skill = $_POST['skill'];
            $str_skill = implode(',', $skill);

            $sql = "INSERT INTO userdata (fname , lname, gender, skill) VALUES ('$fname', '$lname','$gender','$str_skill')";
            $result = mysqli_query($conn, $sql);

            if($result){
               header('location: index.php');
            }else{
               echo 'insert failure';
            }
        }else{
            header("location: formuser.php");
        }
    
    
    }
