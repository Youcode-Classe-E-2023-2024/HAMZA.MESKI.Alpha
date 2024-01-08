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

    public function markRead() {
        $data = json_decode($_POST['notifications']);
        print_r($data);

        for($i = 0; $i < count($data); $i++) {
            $this->dashModel->markRead($data[$i]->id, $_SESSION['user_id']); 
        }
    }

    public function selectMarkRead() {
        $currentUserName = $this->userModel->getUserById($_SESSION['user_id'])->name;
        $notifications = $this->dashModel->getAllAdders($currentUserName);
        $seen_notifications = $this->dashModel->selectMarkRead();

        // echo json_encode($seen_notifications);
        $store = [];
        foreach($notifications as $notification) {
            foreach($seen_notifications as $seen_notification) {
                if($notification->id == $seen_notification->notification_id && $_SESSION['user_id'] == $seen_notification->user_id) {
                    $store[] = $notification->id;
                }
            }
        }

        // print_r($store);
        echo json_encode($this->dashModel->getNotifications($store));
    }
}