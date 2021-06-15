<?php
session_start(); 
    if (isset($_POST['register']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $natid = $_POST['natid'];
        $addr = $_POST['addr'];
        $cno = $_POST['cno'];
        $username = strip_tags($_POST['username']);
        $password = md5(strip_tags($_POST['password']));

        //check whether there's already a user having the same username
        include 'conn.php';

        $query = "SELECT UserID FROM user WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 0)
        {
            $newuser = "INSERT INTO user (Username, Password)
                        VALUES ('$username', '$password')";

            $newprofile = "INSERT INTO profile (firstname, lastname, nationalid, contact, address)
            VALUES ('$fname', '$lname', '$natid', '$cno', '$addr')";

            if (mysqli_query($db, $newuser) AND mysqli_query($db, $newprofile)) {
                header("location:register.php?success=1");
            } else {
                echo "Error: " . $newuser . "<br>" . mysqli_error($db);
            }
        } else {
            //username already exists!
            header("location:register.php?err=2");
        }
    }
?>