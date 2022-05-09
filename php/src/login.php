<?php
    require('../vendor/autoload.php');

    use \App\Session\Login;
    use \App\Entity\User;

    Login::requireLogout();

    // Form alert messages
    $loginAlert = '';
    $registerAlert = '';

    // Post Validation
    if(isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'login':
                $user = User::getUserByEmail($_POST['email']);
                // Validate instance and password
                if(!$user instanceof User || !password_verify($_POST['password'], $user->password)) {
                    $loginAlert = 'Email ou senha inválidos!';
                    break;
                }

                Login::login($user);
                
                break;
            
            case 'register':
                // Validation of mandatory fields
                if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
                    $user = User::getUserByEmail($_POST['email']);
                    if ($user instanceof User) {
                        $registerAlert = 'O email inserido já está em uso.';
                        break;
                    }

                    $user = new User;
                    $user->name = $_POST['name'];
                    $user->email = $_POST['email'];
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user->register();

                    Login::login($user);
                }
                break;
        }
    }

    include('../includes/header.php');
    include('../includes/login-form.php');
    include('../includes/footer.php');
?>