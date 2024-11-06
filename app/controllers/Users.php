<?php
class Users extends Controller{

    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        redirect('main/index');
    }
    
    public function register()
    {
        if(isLoggedIn()){
            redirect('home/');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'pageTitle' => 'Register',
                'username'  => trim($_POST['username']),
                'fullname'  => trim($_POST['fullname']),
                'email'  => trim($_POST['email']),
                'password' => '',
                'username_err'  => '',
                'fullname_err'  => '',
                'email_err'  => '',
                'password_err'  => '',
                'cpassword_err'  => ''
            ];

            if (empty($_POST['username'])){
                $data['username_err'] = 'Username Can\'t Be Left Empty!';
            } elseif (strlen($_POST['username']) < 4) {
                $data['username_err'] = 'Username Can\'t Be Less Than 4 Characters!';
            } elseif($this->userModel->findUserByUsername($_POST['username'])) {
                $data['username_err'] = 'Username Is Already Taken';
            }

            if (empty($_POST['fullname'])) {
                $data['fullname_err'] = 'Fullname Can\'t Be Left Empty';
            } elseif (strlen($_POST['fullname']) < 4) {
                $data['fullname_err'] = 'Fullname Can\'t Be Less Than 4 Characters!';
            }

            if (empty($_POST['email'])){
                $data['email_err'] = 'Email Can\'t Be Left Empty';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Wrong Email Format!';
            } elseif ($this->userModel->findUserByEmail($_POST['email'])) {
                $data['email_err'] = 'This Email Is Already Regiestered!';
            }

            if (empty($_POST['password'])) {
                $data['password_err'] = 'Password Can\'t Be Left Empty!';
            } elseif (strlen($_POST['password']) < 6) {
                $data['password_err'] = 'Password Can\'t Be Less Than 6 Characters!';
            }

            if (empty($_POST['cpassword'])) {
                $data['cpassword_err'] = 'Confirm Password Can\'t Be Left Empty!';
            } elseif ($_POST['password'] != $_POST['cpassword']) {
                $data['cpassword_err'] = 'Password Doesn\'t Match!';
            }

            if (
                empty($data['username_err']) &&
                empty($data['fullname_err']) &&
                empty($data['email_err'])    &&
                empty($data['password_err']) &&
                empty($data['cpassword_err'])
            ) {
                $data['password'] = $_POST['password'];
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)){
                    redirect('pages/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }

        } else {
            $data = [
                'pageTitle' => 'Register',
                'username'  => '',
                'fullname'  => '',
                'email'  => '',
                'password' => '',
                'username_err'  => '',
                'fullname_err'  => '',
                'email_err'  => '',
                'password_err'  => '',
                'cpassword_err'  => ''
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if(isLoggedIn()){
            redirect('home/');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'pageTitle'     => 'Login',
                'email'         => trim($_POST['email']),
                'password'      => '',
                'remember_me'   => isset($_POST['remember_me']) ? 'on' : 'off',
                'email_err'     => '',
                'password_err'  => '',
                'login_err'     => ''
            ];

            if (empty($_POST['email'])){
                $data['email_err'] = 'Email Can\'t Be Left Empty';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Wrong Email Format!';
            }

            if (empty($_POST['password'])) {
                $data['password_err'] = 'Password Can\'t Be Left Empty!';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $data['password'] = $_POST['password'];
                $loggedInUser = $this->userModel->login($data);
                if ($loggedInUser){
                    createUserSession($loggedInUser);
                    redirect('pages/index');
                } else {
                    $data['login_err'] = 'Wrong Email Or Password';
                }
            }
            $this->view('users/login', $data);
        } else {
            $data = [
                'pageTitle'     => 'Login',
                'email'         => '',
                'password'      => '',
                'remember_me'   => '',
                'email_err'     => '',
                'password_err'  => '',
                'login_err'     => ''
            ];
            $this->view('users/login', $data);
        }
    }

    public function logout()
    {
        removeSession();
        redirect('users/login');
    }

    public function me()
    {
        $info = $this->userModel->findUserById($_SESSION['curID']);
        $data = [
            'pageTitle' => 'Me',
            'id' => $info->ID,
            'username' => $info->username,
            'fullname' => $info->fullname,
            'edu' => $info->education,
            'nat' => $info->country,
            'phone_number' => $info->phone_number,
            'birth_date' => $info->birth_date,
            'email' => $info->email,
            'gender' => $info->gender,
            'shareable' => $info->shareable,
            'created_at' => $info->created_at
        ];

        $this->view("users/me", $data);
    }

    public function profile()
    {
        $countries = $this->userModel->getCountries();
        $info = $this->userModel->findUserById($_SESSION['curID']);
        $countryIcon = array('fas fa-globe-europe', 'fas fa-globe-asia', 'fas fa-globe-americas', 'fas fa-globe-africa');
        $countryKey = array_rand($countryIcon);
        $data = [
            'pageTitle' => 'Profile',
            'fullname' => $info->fullname,
            'education' => $info->education,
            'countries' => $countries,
            'countryIcon' => $countryIcon[$countryKey],
            'fullname_err' => '',
            'education_err' => '',
            'country_err' => '',
            'image_err' => '',
            'gender_err' => ''
        ];

        $this->view("users/profile", $data);
    }

    public function account()
    {
        $birthDateIcon = array('fas fa-birthday-cake', 'fas fa-calendar-alt');
        $birthDateKey = array_rand($birthDateIcon);

        $data = [
            'pageTitle' => 'Account',
            'birthDateIcon' => $birthDateIcon[$birthDateKey],
        ];

        $this->view("users/account", $data);
    }

}
?>