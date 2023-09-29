<?php
class Login_Model extends Core
{

    public function login($email, $pass)
    {
        $sql = "select id, name, email, pass, admin from users where email = '{$email}' and pass = MD5('{$pass}') and active = 1";
        $res = $this->db->select($sql);
        $_SESSION["user_id"] = $res[0]["id"] ?? "";
        $_SESSION["is_admin"] = $res[0]["admin"] ?? "";
        return (count($res) > 0) ? array("success" => true, "msg" => "success") : array("success" => false, "msg" => "error");
    }

    public function register($name, $email, $pass, $zipcode, $address, $number)
    {
        $sql = "select id from users where email = '{$email}'";
        $res = $this->db->select($sql);
        if (count($res) > 0)
            return array("success" => false, "msg" => "Usuário já cadastrado");

        $id = $this->db->insert('users', array("name" => $name, "email" => $email, "pass" => md5($pass), "zipcode" => $zipcode, "address" => $address, "number" => $number));
        return array("success" => true, "msg" => "success");
    }
}
