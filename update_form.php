<?php

    require('connectdb.php');
    $required = array('fname', 'lname', 'gender', 'skill');
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($required as $formvalue){
            if(empty($_POST[$formvalue])){
                $error = true;
            }else{

            }
        }
        
        if(!$error){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $skill = $_POST['skill'];
            $id = $_GET['id'];
            $str_skill = implode(',', $skill);

            $sql = "UPDATE `userdata` SET `fname` = '$fname', `lname` = '$lname' , gender = '$gender' , skill = '$str_skill' WHERE `userdata`.`id` = '$id'";
            $result = mysqli_query($conn, $sql);

            if($result){
               header('location: index.php');
            }else{
               echo 'insert failure' . mysqli_error($conn);
            //    echo $fname, $lname , $gender , $str_skill;
            }
        }else{
            header("location: formuser.php");
        }
    
    
    }
