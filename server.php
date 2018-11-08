<?php

    session_start();

    $username = "";
    $email = "";
    $errors = array();

    //se conecteaza la baza de date
    $db = mysqli_connect('localhost', 'root', '', 'demo');

    //daca se apasa butonul de inregistrare
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        //verifica faptul ca s-au completat campurile
        if(empty($username)){
            array_push($errors, "EROARE! Username necompletat!");
        }
        if(empty($email)){
            array_push($errors, "EROARE! Email necompletat!");
        }
        if(empty($password_1)){
            array_push($errors, "EROARE! Parola necompletata!");
        }
        if($password_1 != $password_2){
            array_push($errors, "EROARE! Parolele nu coincid!");
        }

        //daca nu se gasesc erori - introdu userul in baza de date
        //cu toate datele acestuia
        if(count($errors) == 0){
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Esti logat";
            header('location: index.php'); // face redirectarea catre pagina principala
        }

    }

    //log user from login page
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        if(empty($username)){
            array_push($errors, "EROARE! Username necompletat!");
        }
        if(empty($email)){
            array_push($errors, "EROARE! Email necompletat!");
        }
        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Esti logat";
                header('location: index.php'); // face redirectarea catre pagina principala
            }
            else{
                array_push($errors, "Username sau parola gresita");
                header('location: login.php');
            }
        }
    }

    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }


?>