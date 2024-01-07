<?php 
class Dashboard extends Controller {
    public $dashModel;
    public $userModel;
    public  function __construct() {
        $this->dashModel = $this->model('Dash');
        $this->userModel = $this->model('User');
    }

    public function index() {
        $this->view('dashboard/index');
    }

    public function insertAdderName() {
        $currentUserName = $this->userModel->getUserById($_SESSION['user_id'])->name;
        $this->dashModel->insertAdderName($currentUserName);
    }

    public function getAllUsers() {
        $currentUserName = $this->userModel->getUserById($_SESSION['user_id'])->name;
        $users = $this->dashModel->getAllAdders($currentUserName);
        echo json_encode($users);
    }
}