<?php

namespace App\Entity;

use App\Database\Database;
use PDO;

class User
{
    /**
     * Unique indentifier user.
     * @var integer
     */
    public $id;

    /**
     * Username.
     * @var string
     */
    public $name;

    /**
     * User email.
     * @var string
     */
    public $email;

    /**
     * User hash password.
     * @var string
     */
    public $password;

    /**
     * Method responsible for registering a new user in the database.
     * @return boolean
     */
    public function register()
    {
        $database = new Database('users');

        $this->id = $database->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        return true;
    }

    /**
     * Method responsible for returning a user instance based on your email.
     * @param string $email
     * @return User
     */
    public static function getUserByEmail($email)
    {
        return (new Database('users'))->select('email = "'. $email .'"')
            ->fetchObject(self::class);
    }
}
?>