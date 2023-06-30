<?php

class User
{
    private string $username;
    private string $password;

    public static function allArgs(string $username, string $password): User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        return $user;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function encryptPassword(): string
    {
        return password_hash($this->password, PASSWORD_BCRYPT);
    }
}
