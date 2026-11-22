<?php 
    declare(strict_types = 1);

    class NoteController {
        private NoteModel $note_model;

        public function __construct(NoteModel $note_model)
        {
            $this->note_model = $note_model;
        }

        public function index(array $response = []): void {
            if (!isset($_SESSION['user_id'])) {
                header("Location: /notes/main.php?action=login");
                exit;
            } 
            $userId = (int) $_SESSION['user_id'];
            $notes = $this->note_model->getNotesByUserId($userId);

            require __DIR__ . "/../views/notesv/index.php";

        }

        public function create(array $response = []): void {
            require __DIR__. "/../views/notesv/create.php";
        }

        public function storeNote(): void {
            $response = [];
            if (!isset($_SESSION['user_id'])) {
                header("Location: /notes/main.php?action=login");
                exit;
            }

            if (isset($_POST['save'])) {
                $body = trim($_POST['note']);
                

                if (!empty($body)) {
                    $userId = (int) $_SESSION['user_id'];
                    $note = $this->note_model->create($body, $userId);

                    if ($note) {
                        $response['success'] = true;
                        $response['message'] = 'note create by seccussfly';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'note is Invalid ';
                    }

                } else {
                    $response['success'] = false;
                    $response['message'] = 'should field fill it';
                }
            }

            $this->create($response);
        }

        public function delete(): void {
            $response = [];
            if (!isset($_SESSION['user_id'])) {
                header("Location: /notes/main.php?action=login");
                exit;
            }
            
            if (isset($_POST['delete'])) {
                $id = filter_var( $_POST['id'], FILTER_VALIDATE_INT);

                if ($id === false || $id === null || $id <= 0) {
                    $response['success'] = false;
                    $response['message'] = 'Invalid note ID.';
                    $this->index($response);
                    return;
                }

                $userId = (int) $_SESSION['user_id'];
                $note = $this->note_model->findById((int) $id, $userId);

                

                if ($note) {
                    try {
                        $success = $this->note_model->deleteNote($id, $userId);

                        if ($success) {
                            $response['success'] = true;
                            $response['message'] = 'the note is deleted by successfly';
                        } else {
                            $response['success'] = false;
                            $response['message'] = "the note isn't deleted";
                        }
                    } catch (PDOException $e) {
                        error_log($e->getMessage());
                        $response['success'] = false;
                        $response['message'] = "the note isn't deleted";
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = "the note isn't deleted";
                }

                
            }
            $this->index($response);
        }
    }
?>