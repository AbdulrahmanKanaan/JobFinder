<?php
class Home extends Controller {

    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
    }

    public function index(){
        
        $data = [
            'pageTitle' => 'Home'
        ];

        $this->view('home/index');
    }

}
?>