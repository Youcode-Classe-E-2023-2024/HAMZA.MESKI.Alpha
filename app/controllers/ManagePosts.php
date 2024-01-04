<?php
class ManagePosts extends Controller {
    public function index(){
        $this->view('managePosts/index');
    }

    public function addPost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize POST array
            // $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $title_arr = []; 
            foreach($_POST['title'] as $title) {
                $title_arr[] = trim(filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            }
            $body_arr = [];
            foreach($_POST['body'] as $body) {
                $body_arr[] = trim(filter_var($body, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }
        
            $data = [
                'title_arr' => $title_arr, 
                'body_arr' => $body_arr, 
                'user_id' => $_SESSION['user_id'], 
                'title_err' => '', 
                'body_err' => ''
            ];

            // validate title 
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // validate body 
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            // make sure no errors 
            if(empty($data['title_err']) && empty($data['body_err'])) {
                // validated
                redirect('managePosts/index');
            }else {
                // load view with errors 
                $this->view('managePosts/addPost', $data);
            }

        }else {
            $data = [
                'title' => [''],
                'body' =>  [''],
                'user_id' => '', 
                'title_err' => '', 
                'body_err' => ''
            ];
    
            $this->view('managePosts/addPost', $data);
        }
    }

    public function editPost($postId){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize POST array
            $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $data = [
                'postId' => $postId,
                'title' => trim($title), 
                'body' => trim($body),
                'user_id' => $_SESSION['user_id'], 
                'title_err' => '', 
                'body_err' => ''
            ];

            // validate title 
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // validate body 
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            // make sure no errors 
            if(empty($data['title_err']) && empty($data['body_err'])) {
                // validated
                redirect('managePosts/index');
            }else {
                // load view with errors 
                $this->view('managePosts/editPost', $data);
            }

        }else {
            $data = [
                'postId' => $postId,
                'title' => '',
                'body' =>  '',
                'user_id' => '', 
                'title_err' => '', 
                'body_err' => ''
            ];
    
            $this->view('managePosts/editPost', $data);
        }
    }
}
?>