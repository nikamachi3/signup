<?php
    if(isset($_POST["signup-submit"])){
        require "dbh.inc.php";
        $email = $_POST["emailid"];
        $userid = $_POST["userid"];
        $psw = $_POST["psw"];
        $psw2 = $_POST["psw-repeat"];
        if(empty($email) || empty($userid) || empty($psw) || empty($psw2)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userid)){
            header("Location: ../signup.php?error=bothUsername&EmailIsInvalid");
            exit();
        }

        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=emailisnotcorrectlyvalidated&Username=".$userid);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $userid)){
            header("Location: ../signup.php?error=usernamesnotcorrectlyvalidated&Username=".$email);
            exit();
        }
        else if($psw !== $psw2){
            header("Location: ../signup.php?error=PasswordDoesNotMatchd&Email=".$email."Username=".$userid);
            exit();
        }
        else{
            $sql = "SELECT Username FROM users WHERE Username=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?sql=error");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $userid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("Location: ../signup.php?error=usernameALREADYTAKEN");
                    exit();  
                }
                else{
                    $sql = "INSERT INTO users(Username, Email, Password) VALUES(?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?sql=error");
                        exit();
                    }
                    else{
                        $hashed = password_hash($psw, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $userid, $email, $hashed);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=ebaat");
                        exit();
                    }
                }
            }
            
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else{
        header("Location: ../signup.php?ardagicheria");
        exit();
    }
