<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bcrypt {

    private $rounds;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->config('bcrypt');

        $this->rounds = $this->CI->config->item('bcrypt_rounds');
    }

    public function hash_password($password)
    {
        $options = [
            'cost' => $this->rounds,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function verify_password($password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }

}
