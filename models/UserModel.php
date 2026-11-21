<?php 
    declare(strict_types = 1);

    class UserModel {
        private PDO $database;

        public function __construct(PDO $database)
        {
            $this->database = $database;
        }

        public function index(): array{
            $stmt = $this->database->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function create(
            string $email,
            string $password
        ): bool {
            $stmt = $this->database->prepare("
            INSERT INTO users (email, password) VALUES (:email, :password)
            ");
            return $stmt->execute([
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);

        }

        public function findUserByEmail(string $email): object | false {
            $stmt = $this->database->prepare("
                SELECT * FROM users WHERE email = :email
            ");
            $stmt->execute([
                "email" => $email
            ]);

            return $stmt->fetch();
        }

        public function getUserById(int $id): object | false {
            $stmt = $this->database->prepare("
                SELECT * FROM users WHERE id = :id
            ");
            $stmt->execute(["id" => $id]);
            return $stmt->fetch();
        }

    }
?>