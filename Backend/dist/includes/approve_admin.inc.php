 <?php
    if (isset($_POST['approve-submit'])) {
        require 'connection.inc.php';
        
        $id = mysqli_real_escape_string($conn, $_POST['approve-submit']);
        $status = mysqli_real_escape_string($conn, "active");

            $sql = "SELECT name FROM admins WHERE id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../admins.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE admins SET status=? WHERE id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admins.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admins.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../admins.php&suspended");
        exit();
    }