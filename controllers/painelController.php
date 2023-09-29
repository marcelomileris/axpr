<?php

class painelController extends Controller
{

    public function index()
    {
        $user_id = $_SESSION["user_id"];
        $is_admin = $_SESSION["is_admin"];
        if ($user_id == "") :
            header("Location:" . BASE_URL);
            die();
        endif;

        if ($is_admin == 1)
            $this->loadView("painel");
        else
            $this->loadView("painel_user");
    }

    public function data()
    {
        include_once "models/painel_model.php";
        $painel = new Painel_Model();
        $res = $painel->data();
        echo json_encode($res);
    }

    public function active()
    {
        $user_id = Data::str(INPUT_POST, "user_id");
        $active = Data::str(INPUT_POST, "active");

        include_once "models/painel_model.php";
        $painel = new Painel_Model();

        return $painel->update('users', array("active" => $active), "id = {$user_id}");
    }

    public function admin()
    {
        $user_id = Data::str(INPUT_POST, "user_id");
        $admin = Data::str(INPUT_POST, "admin");

        include_once "models/painel_model.php";
        $painel = new Painel_Model();

        return $painel->update('users', array("admin" => $admin), "id = {$user_id}");
    }

    public function delete()
    {
        $user_id = Data::str(INPUT_POST, "user_id");
        include_once "models/painel_model.php";
        $painel = new Painel_Model();
        return $painel->del('users', "id = {$user_id}");
    }

    public function add()
    {
        include_once "models/painel_model.php";
        $painel = new Painel_Model();

        $user_id = Data::str(INPUT_POST, "user_id");
        $data = array(
            "name"  => Data::str(INPUT_POST, "name"),
            "email" => Data::str(INPUT_POST, "email"),
            "pass"  => Data::str(INPUT_POST, "pass")
        );
        return $painel->add($user_id, $data);
    }

    public function get()
    {
        include_once "models/painel_model.php";
        $painel = new Painel_Model();
        $user_id = Data::str(INPUT_POST, "user_id");
        echo json_encode($painel->get($user_id));
    }

    public function logout()
    {
        $_SESSION["user_id"] = "";
        header("Location:" . BASE_URL);
        die();
    }


    /* ************************************************************************************ */
    # API de CEP
    # Via Cep (viacep.com.br)
    public function getaddress($zipcode)
    {
        $url = "https://viacep.com.br/ws/{$zipcode}/json/";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err == "") {

            $address =  json_decode($response, true);
            echo json_encode(array("success" => true, "data" => $address), JSON_UNESCAPED_UNICODE);
        } else
            echo json_encode(array("success" => false, "msg" => "Cep não encontrado!"));
    }

    /* ************************************************************************************ */
}
