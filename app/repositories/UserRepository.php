<?php

class UserRepository extends Repository
{
    public function findByUsername(string $username): User|null
    {
        try {
            $sql = 'SELECT * FROM user WHERE username = ?';
            $result = $this->query($sql, [$username]);
            return empty($result) ? null : User::allArgs($username, $result[0]['password']);
        } catch (PDOException $error) {
            return null;
        }
    }
}
