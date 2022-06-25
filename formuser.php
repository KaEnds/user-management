<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>form</title>
</head>

<body>

    <?php session_start(); ?>

    
    <div class="user-form">
        <form action="add_form.php" method="post" class="m-5">
            <h1>Insert new user</h1>
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" name="fname" class="form-control">
            <span class="err-text"><?php echo $_SESSION['errtxt']['Errfname']; ?></span>
            <br>
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" name='lname' class="form-control">
            <span class="err-text"><?php echo $_SESSION['errtxt']['Errlname']; ?></span>
            <br>
            <div>
                <label for="gender" class="form-label">gender : </label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" value='male'>
                    <label for="male" class="form-check-label">male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" value='female'>
                    <label for="female" class="form-check-label">female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" value="other">
                    <label for="other" class="form-check-label">other</label>
                </div>
                <span class="err-text"><?php echo $_SESSION['errtxt']['Errgender']; ?></span>
            </div>

            <br>
            <div>
                <label for="skill">skill :</label>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="skill[]" value='php'>
                    <label for="php" class="form-check-label">php</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="skill[]" value='javascript'>
                    <label for="javascript" class="form-check-label">javascript</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="skill[]" value='html'>
                    <label for="html" class="form-check-label">html</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="skill[]" value='css'>
                    <label for="css" class="form-check-label">css</label>
                </div>
                <span class="err-text"><?php echo $_SESSION['errtxt']['Errskill']; ?></span>
            </div>

            <br>
            <input type="submit" name="user-insert" class="btn btn-success my-4" value="save">
            <a href="index.php" class="btn btn-warning my-4">back</a>
        </form>
    </div>

</body>

</html>