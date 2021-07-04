<?php
    function emptyInputSignUp($name, $email, $username, $password, $pwdRepeat){
        $result = true;
        if (empty($name) || empty($email) || empty($username) || empty($password) || empty($pwdRepeat)){
            $result = true;                                                          
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($username){
        $result = true;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = false;                                                          
        }
        else{  
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        $result = true;
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!preg_match($regex, $email)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    
    function pwdMatch($password, $pwdRepeat){
        $result = true;
        if ($password != $pwdRepeat){
            $result = true;                                                          
        }
        else{  
            $result = false;
        }
        return $result;
    }
    function uidExists($conn, $username, $email){
        $sql = "SELECT * FROM  users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error = stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ( $row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
    function createUser($conn, $name, $email, $username, $password, $gsmNo, $job){

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersPhone, usersJob) VALUES ('$name', '$email', '$username', '$hashedPwd', '$gsmNo', '$job')";
       
       /*
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error = stmtfailed");
            exit();
        }
*/

        $ekle = mysqli_query($conn, $sql);

        if($ekle){

            header("location: ../signup.php?error=none");
            exit();

        }

        /*
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $username, $hashedPwd, $gsmNo, $job);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        */
        
    }

    function emptyInputLogin($username, $password){
        $result = true;
        if (empty($username) || empty($password)){
            $result = true;                                                          
        }else{
            $result = false;
        }
        return $result;
    }

    

    function login_user($conn, $username, $password){

    $kullanici_sor = mysqli_query($conn, "SELECT * FROM users WHERE usersUid='$username'");

    $kullanici_varmi = mysqli_num_rows($kullanici_sor);

    $uid_exists = uidExists($conn, $username, $username);

    $kullanici_pass = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM users WHERE usersUid='$username'"));


    

    if($kullanici_varmi==1 and password_verify($password,$kullanici_pass->usersPwd) == true){

        session_start();
        $_SESSION["userid"] = $uid_exists["id"];
        $_SESSION["useruid"] = $uid_exists["usersUid"];
        $_SESSION["useremail"] = $uid_exists["usersEmail"];
        $_SESSION["userphone"] = $uid_exists["usersPhone"];
        $_SESSION["userjob"] = $uid_exists["usersJob"];
        $_SESSION["userfullname"] = $uid_exists["usersName"];
        header("location: ../main_page.php");


    }else{

       /*
        header("location: ../loginPage.php?error=wrongPassword");

        
*/

    echo 'Kullanıcı varım : '.$kullanici_varmi.'<br>';

     echo 'Login Gönderilen şifre : '.$password.'<br>';

     echo 'Veritabanı şifre : '.$kullanici_pass->usersPwd.'<br>';

        if(password_verify($password,$kullanici_pass->usersPwd) == true){

            echo 'Pwd durum : True'; 
       
           }else{
       
       echo 'Pwd durum : False'; 
               
           }


        exit();

    }






        /*
        $uid_exists = uidExists($conn, $username, $email);
        $pwdHashed = $uid_exists["usersPwd"];
        $kullanici_sor = mysqli_query($conn,"SELECT * FROM users WHERE usersUid='$username' and usersPwd='$password'");
        
        if (password_verify($password,$pwdHashed) == true){
            if(mysqli_num_rows($kullanici_sor)==1){

                session_start();
                $_SESSION["useruid"] = $username;
                header("location: ../main_page.php");

            }else{

                header("location: ../loginPage.php?error=wronglogin");
                exit();
            
            }
            }else{
            header("location: ../loginPage.php?error=wrongPassword");
             }
*/
/*
       $uid_exists = uidExists($conn, $username, $username);
        if ($uid_exists === false){
            header("location: ../loginPage.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uid_exists["usersPwd"];
        
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false){
            
            session_start();
            $_SESSION["userid"] = $uid_exists["id"];
            $_SESSION["useruid"] = $uid_exists["usersUid"];
            $_SESSION["useremail"] = $uid_exists["usersEmail"];
            $_SESSION["userphone"] = $uid_exists["usersPhone"];
            $_SESSION["userjob"] = $uid_exists["usersJob"];
            $_SESSION["userfullname"] = $uid_exists["usersName"];
            header("location: ../main_page.php");
            
      
        }
        else if ($checkPwd === true){
            session_start();
            $_SESSION["userid"] = $uid_exists["id"];
            $_SESSION["useruid"] = $uid_exists["usersUid"];
            $_SESSION["useremail"] = $uid_exists["usersEmail"];
            $_SESSION["userphone"] = $uid_exists["usersPhone"];
            $_SESSION["userjob"] = $uid_exists["usersJob"];
            $_SESSION["userfullname"] = $uid_exists["usersName"];
            header("location: ../main_page.php");
        }

        */
    }

        ?>











































































































































































































































































































































































































































































































































































































