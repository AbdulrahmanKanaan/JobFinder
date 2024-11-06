<?php

class Core{

    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = array();

    public function __construct(){
        // take the url from the browser
        $url = $this->getUrl();
        // if the url the user asked for exists set the current controller to it
        if(file_exists(APPROOT . '/controllers/' . ucwords($url[0]) . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // requrie the controller
        require_once(APPROOT . '/controllers/' . $this->currentController . '.php');
        // instantiate controller class
        $this->currentController = new $this->currentController();

        // check if the method exists
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // get params
        $this->params = $url ? array_values($url) : [] ;

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
};

?>