<?php

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get();
        return $query->result();
    }

    public function read_user_information($mail)
    {
        $condition = "email =" . "'" . $mail . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}