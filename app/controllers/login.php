<?php

    session_start();
    require_once(__DIR__ . "/../models/user.php");

    echo "1";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();

        $currentUser = $user->getId($username);

        var_dump($currentUser);

        $test = $currentUser['password'];

        var_dump($test);
        echo "2";



        var_dump(password_verify('client', $currentUser['password']));

        if ($currentUser && password_verify($password, $currentUser['password'])) {

            $id = $currentUser['id'];
            echo "2";
            // var_dump($id);
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $currentUser['username'];
            $roles = $user->getRoles($id);
            // var_dump($roles);
            $_SESSION['roles'] = $roles;

            foreach($roles as $role):
            
                if (in_array("admin", $role) || in_array("sub", $role)) {
                    header("Location: ../../admin/bank.php");
                } else if (in_array("client", $role)) {
                    header("Location: ../../client/account.php");
                } else {
                    die("Error");
                }
            endforeach;
        }
    }

?>