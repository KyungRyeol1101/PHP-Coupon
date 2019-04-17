<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Auth_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    //DB에서 로그인 체크
    function login($auth) {
        $sql = "SELECT username, email FROM users WHERE username = '" . $auth['username'] . "' AND password = '" . $auth['password'] . "' ";
        $query = $this -> db -> query($sql);

        if ($query -> num_rows() > 0) {
            return $query -> row();
        } else {
            return FALSE;
        }
    }
}
