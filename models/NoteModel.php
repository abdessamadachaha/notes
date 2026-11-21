<?php 
    declare(strict_types = 1);

    class NoteModel {
        private PDO $database;

        public function __construct(PDO $database)
        {
            $this->database = $database;
        }


        public function getNotesByUserId(int $userId): array {
            $stmt = $this->database->prepare("SELECT * FROM notes WHERE user_id = :id");
            $stmt->execute([
                "id" => $userId
            ]);
            return $stmt->fetchAll();
        }

        public function create(string $note, int $userId): bool {
            $stmt = $this->database->prepare("INSERT INTO notes (body, user_id) VALUES (:note, :userId)");
            return $stmt->execute([
                "note" => $note,
                "userId" => $userId
            ]);
        }

        public function findById(int $noteId, int $userId): object | false {
            $stmt = $this->database->prepare("SELECT * FROM notes WHERE note_id = :noteId and user_id = :userId");
            $stmt->execute([
                "noteId" => $noteId,
                "userId" => $userId
            ]);
            return $stmt->fetch();
        }

        public function updateNote(int $noteId, int $userId, string $body) : bool {
            $stmt = $this->database->prepare("UPDATE notes SET body = :body WHERE note_id = :noteId AND user_id = :userId");
            $stmt->execute([
                "noteId" => $noteId,
                "userId" => $userId,
                "body" => $body
            ]);

            return $stmt->rowCount() > 0;
        }

        public function deleteNote(int $noteId, int $userId) : bool {
            $stmt = $this->database->prepare("DELETE FROM note WHERE note_id = :noteId AND user_id = :userId");
            return $stmt->execute(
                [
                    "noteId" => $noteId,
                    "userId" => $userId
                ]
            );
        }
    }

?>