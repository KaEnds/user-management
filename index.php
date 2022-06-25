<?php require('connectdb.php') ?>
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
    <link rel="stylesheet" href="table.css">
    <title>show data</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($conn, $sql);
    $index = 1;

    ?>

    <div class="user-table">
        <h1>User table</h1>
        <table class="table table-bordered text-center">
            <caption>List of users</caption>
            <thead>
                <th>id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>gender</th>
                <th>skill</th>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['skill'] . "</td>";
                    echo '</tr>';
                    $index++;
                } ?>
            </tbody>
        </table>
        <a href="formuser.php" class="btn btn-success">Insert user</a>
        <button class="btn btn-warning edit-btn">Edit</button>
        <button class="btn btn-danger delete-btn">Delete</button>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $(document).ready(function() {

            $(".edit-btn").click(function() {
                $(".table").removeClass('del-table')
                $(".table").toggleClass("show-table")
                if ($(".table").hasClass('show-table')) {
                    $(".show-table").on("click", "tbody tr", function() {
                        $(this).addClass('highlight').siblings().removeClass('highlight');
                        var col1 = $(".highlight").find("td:eq(0)").text();

                        $(location).prop('href', 'edit_user.php?id=' + col1)
                    })
                }else{
                    location.reload();
                }

            })
            $(".delete-btn").click(function() {
                $('.table').removeClass('show-table')
                $('.table').toggleClass("del-table")
                if ($(".table").hasClass("del-table")) {
                    $('.del-table').on("click", 'tbody tr', function() {
                        $(this).addClass('del').siblings().removeClass('del');
                        var del1 = $(".del").find("td:eq(0)").text();
                        if(confirm("do you sure to delete this row?")){
                            $(location).prop('href', 'delete_user.php?id=' + del1)

                        }
                    })
                }else{
                    location.reload();
                }
            })

        })
    </script>

</body>

</html>