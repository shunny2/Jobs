<?php

namespace App\Session;

class Login
{
    /**
     * Method responsible for starting the session.
     */
    private static function init()
    {
        // Check session status
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Method responsible for logging in the user.
     * @param User $user
     */
    public static function login($user)
    {
        self::init();

        $_SESSION['user'] = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];

        header('location: index.php');
        exit;
    }

    /**
     * Method responsible for logging out the user.
     */
    public static function logout()
    {
        self::init();

        // Remove user session
        unset($_SESSION['user']);

        header('location: login.php');
        exit;
    }

    /**
     * Method responsible for returning session data.
     * @return array
     */
    public static function getUserLoggedIn()
    {
        self::init();

        // Return user data
        return self::isLogged() ? $_SESSION['user'] : null;
    }

    /**
     * Method responsible for checking if the user is logged into the site.
     * @return boolean
     */
    public static function isLogged()
    {
        self::init();

        // Session validation
        return isset($_SESSION['user']['id']);
    }

    /**
     * Method responsible for forcing the user to be logged in to access.
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            // Redirect to login page
            header('location: login.php');
            exit;
        }
    }

    /**
     * Method responsible for forcing the user to be logged out to access.
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            // Redirect to index page
            header('location: index.php');
            exit;
        }
    }
}
?>