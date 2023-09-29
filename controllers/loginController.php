<?php

class loginController extends Controller
{

    public function index()
    {
        $this->loadView("login");
    }

    public function login()
    {
        include_once "models/login_model.php";
        $login = new Login_Model();
        $email  = Data::str(INPUT_POST, "email");
        $pass   = Data::str(INPUT_POST, "pass");

        $res = $login->login($email, $pass);
        echo json_encode($res);
    }

    public function register()
    {
        include_once "models/login_model.php";
        $login = new Login_Model();
        $name = Data::str(INPUT_POST, "name");
        $email = Data::str(INPUT_POST, "email");
        $pass = Data::str(INPUT_POST, "pass");
        $zipcode = Data::str(INPUT_POST, "zipcode");
        $address = Data::str(INPUT_POST, "address");
        $number = Data::str(INPUT_POST, "number");


        $res = $login->register($name, $email, $pass, $zipcode, $address, $number);
        echo json_encode($res);
    }
}
