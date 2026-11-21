<?php 
    declare(strict_types = 1);

    class UserController {
        private UserModel $user_model;

        public function __construct(UserModel $user_model)
        {
            $this->user_model = $user_model;
        }

        public function signup(array $response = []): void {
            require __DIR__."/../views/users/auth/signup.php";
        }

        public function login(array $response = []): void {
            require __DIR__. "/../views/users/auth/login.php";
        }

        public function store(): void {
            $response = [];
            if (isset($_POST['signup'])) {
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                $password = $_POST['password'] ?? '';
                $confirmPass = $_POST['confirmPassword'] ?? '';

                if (!empty($email) && !empty(trim($password)) && !empty(trim($confirmPass))) {
                    if ($password === $confirmPass) {
                        try {
                            $success = $this->user_model->create($email, $password);

                            if ($success) {
                               $response['success'] = true;
                               $response['message'] = 'the user create it by successfly';
                            } else {
                                $response['success'] = false;
                                $response['message'] = 'Unable to create user';
                            }

                        } catch (PDOException $e) {
                            error_log($e->getMessage());
                            $response['success'] = false;
                            $response['message'] = 'Failed to create user';
                        }
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'please check password';
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'all Fields be fill';
                }
            } 
            $this->signup($response);
        }

        public function register(): void {
            $response = [];
            if (isset($_POST['login'])) {
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                $password = $_POST['password'] ?? '';

                $user = $email !== false ? $this->user_model->findUserByEmail($email) : false;

                if ($user !== false && password_verify($password, $user->password)) {
                    session_regenerate_id(true);
                    $_SESSION['user_id'] = $user->id;

                    header("Location: /notes/main.php?action=dashboard");
                    exit();
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Invalid email or password.';
                }
            }

            $this->login($response);

        }

        public function dashboard(): void {
            if (!isset($_SESSION['user_id'])) {
                header("Location: /notes/main.php?action=login");
                exit;
            }

            $userId = (int) $_SESSION['user_id'];
            $user = $this->user_model->getUserById($userId);

            if ($user === false) {
                header("Location: /notes/main.php?action=login");
                exit;
            }

            require __DIR__. "/../views/dashbord.php";
        }

        
        
    } 
?>