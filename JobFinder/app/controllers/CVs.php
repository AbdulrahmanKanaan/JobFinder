<?php
class CVs extends Controller {

    private $cvModel;
    private $userModel;
    public function __construct() {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->cvModel = $this->model('CV');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'CVs',
        ];

        $this->view('CVs/index', $data);
    }

    public function show($id = '')
    {
        if(empty($id)){
            $id = $_SESSION['curID'];
        }
        $info = $this->userModel->findUserById($id);
        $data = [
            'pageTitle' => 'Show',
            'fullname' => $info->fullname,
            'edu' => $info->education,
            'nat' => $info->country,
            'phone_number' => $info->phone_number,
            'birth_date' => $info->birth_date,
            'email' => $info->email,
            'gender' => $info->gender,
            'UserID' => $_SESSION['curID'],
            'ID' => $id
        ];
        
        $data['miniCVs'] = $this->cvModel->getMiniCVs($id);

        $this->view('CVs/show', $data);
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'pageTitle' => 'Add',
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'title_err' => '',
                'content_err' => '',
                'UserID' => $_SESSION['curID']
            ];

            if(empty($data['title'])){
                $data['title_err'] = "this field can not be empty!";
            }
            if(empty($data['content'])){
                $data['content_err'] = "this field can not be empty!";
            }

            if(empty($data['title_err']) && empty($data['content_err'])) {
                if($this->cvModel->insert($data)){
                    flash('cv_add', 'Congrats! You Added A New Achievement To Your CV', 'alert alert-success');
                    redirect('cvs/show/' . $_SESSION['curID']);
                } else {
                    die("something went wrong");
                }
            } else {
                $this->view('cvs/add', $data);
            }

            
        } else {

            $data = [
                'pageTitle' => 'Add',
                'title' => '',
                'content' => '',
                'title_err' => '',
                'content_err' => '',
            ];

            $this->view('CVs/add', $data);
        }

    }

    public function edit($id = '')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(empty($id)) {
                flash('edit_err', 'No Mini CV Selected!', 'alert alert-warning');
                redirect('cvs/show/' . $_SESSION['curID']);
            } elseif(!$this->cvModel->isEditable($_SESSION['curID'], $id)) {
                flash('edit_err', 'You Have No Permision To Edit This Mini CV!', 'alert alert-warning');
                redirect('cvs/show/' . $_SESSION['curID']);
            }

            $data = [
                'pageTitle' => 'Edit',
                'miniCvId' => $id,
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'title_err' => '',
                'content_err' => ''
            ];

            if(empty($data['title'])){
                $data['title_err'] = "this field can not be empty!";
            }
            if(empty($data['content'])){
                $data['content_err'] = "this field can not be empty!";
            }
            
            if(empty($data['title_err']) && empty($data['content_err'])) {
                if($this->cvModel->update($data)){
                    flash('cv_edit', 'You Updated Your CV Successfully!', 'alert alert-success');
                    redirect('cvs/show/' . $_SESSION['curID']);
                } else {
                    die("something went wrong");
                }
            } else {
                $this->view('cvs/edit', $data);
            }
            
        } else {
            
            if(empty($id)) {
                flash('edit_err', 'No Mini CV Selected!', 'alert alert-warning');
                redirect('cvs/show/' . $_SESSION['curID']);
            } elseif(!$this->cvModel->isEditable($_SESSION['curID'], $id)) {
                flash('edit_err', 'You Have No Permision To Edit This Mini CV!', 'alert alert-warning');
                redirect('cvs/show/' . $_SESSION['curID']);
            }
            $miniCV = $this->cvModel->getMiniCvById($id);
            $data = [
                'pageTitle' => 'Edit',
                'miniCvId' => $id,
                'title' => $miniCV->title,
                'content' => $miniCV->content,
                'title_err' => '',
                'content_err' => ''
            ];
            
            $this->view('cvs/edit', $data);
        }
       
    }

    public function delete()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!isset($_POST['id'])){
                die("Access Denied!");
            }
            $id = is_numeric($_POST['id']) ? $_POST['id'] : '';
            if(!empty($id) && $this->cvModel->isEditable($_SESSION['curID'], $id)) {
                $this->cvModel->delete($id);
            } else {
                die("Something Went Wrong!");
            }
            $data['miniCVs'] = $this->cvModel->getMiniCvs($_SESSION['curID']);
            $data['ID'] = $_SESSION['curID'];
            $this->view('cvs/delete', $data);
        } else {
            die("You Can't Access This Page Directly!");
        }
    }
}
?>