<?php
class ManagePosts extends Controller {
    public function index(){
        $this->view('managePosts/index');
    }

    public function addPost(){
        $this->view('managePosts/addPost');
    }
}
?>