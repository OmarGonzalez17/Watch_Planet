<?php
    if (isset($_POST['pass-submit'])) {
        require 'connection.inc.php';
        
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if($resultCheck > 0){
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $pass_confirm = mysqli_real_escape_string($conn, $_POST['pass_confirm']);
        }else{
            header("Location: ../login.php");
            exit();
        }
        if ($pass !== $pass_confirm) {
            header("Location: ../login.php?error=passwordcheck");
            exit();
        }
            else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                $sql = "UPDATE users SET pass=? WHERE email=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
                    
                    mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?error=SUCCESS");
                    exit();
                }
                
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);