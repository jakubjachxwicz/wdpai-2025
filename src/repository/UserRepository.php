<?php

require_once 'Repository.php';

class UserRepository extends Repository 
{
    public function getUsers() : ?array
    {
        $query = $this->database->connect()->prepare('
            SELECT * FROM users
            ORDER BY id ASC 
        ');

        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUserByEmail(string $email) : ?array
    {
        $query = $this->database->connect()->prepare('
            SELECT * FROM users
            WHERE email = :email
        ');

        $query->bindParam(':email', $email, PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function createUser(string $email, string $password, string $firstName, string $lastName = 'Roblox', string $bio = '') : void
    {
        $query = $this->database->connect()->prepare('
            INSERT INTO users (email, password, firstName, lastName, bio) 
            VALUES (:email, :password, :first_name, :last_name, :bio)
        ');

        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->bindParam(':bio', $bio);

        $query->execute();
    }
}