<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>edit_user</title>
</head>

<body>

    <?php
        require('connectdb.php');

        $Fname = $Lname = $Gender = '';
        $Skill = [];
        $id = $_GET['id'];
        $sql = "SELECT * FROM userdata WHERE id=$id";
        $data = mysqli_query($conn, $sql);

        if(mysqli_num_rows($data) > 0){
            $row_data = mysqli_fetch_assoc($data);
            $Fname = $row_data['fname'];
            $Lname = $row_data['lname'];
            $Gender = $row_data['gender'];
            $Skill = $row_data['skill'];


        }else{
            $err = "connect to database fail";
        }
    ?>

    <div class="user-form">
        <form action="update_form.php?id=<?php echo $id;?>" method="post" class="m-5">
            <h1>Edit user data</h1>
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $Fname ;?>">
            <br>
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" name='lname' class="form-control" value="<?php echo $Lname ;?>">
            <br>
            <div class="radio-input">
                <label for="gender" class="form-label">gender : </label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input male" name="gender" value='male'>
                    <label for="male" class="form-check-label">male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input female" name="gender" value='female'>
                    <label for="female" class="form-check-label">female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input other" name="gender" value="other">
                    <label for="other" class="form-check-label">other</label>
                </div>
            </div>

            <br>
            <div>
                <label for="skill">skill :</label>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input php" name="skill[]" value='php'>
                    <label for="php" class="form-check-label">php</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input javascript" name="skill[]" value='javascript'>
                    <label for="javascript" class="form-check-label">javascript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input html" name="skill[]" value='html'>
                    <label for="html" class="form-check-label">html</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input css" name="skill[]" value='css'>
                    <label for="css" class="form-check-label">css</label>
                </div>
            </div>

            <br>
            <input type="submit" name="submit" class="btn btn-success my-4" value="update">
            <a href="index.php" class="btn btn-warning my-4">back</a>
        </form>

        <script>
            $(document).ready(function(){
                var gender = ".<?php echo $Gender ;?>"
                $(gender).attr('checked', true)
                var Ar_skill = "<?php print_r($Skill);?>"
                var skill = Ar_skill.split(',')

                $.each(skill, function(key, val){
                    $('.' + val).attr("checked", true)
                })
                
            })
        </script>
</body>

</html>