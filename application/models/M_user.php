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

    public function ajouter_tarif($tarif, $id_user)
    {
        $last_tarif = $this->get_solde_client($id_user);
        $new_tarif = $last_tarif[0]->sold + $tarif;
        $sql = "update user set sold = $new_tarif where id = $id_user";
        $query = $this->db->query($sql);
    }

    public function get_solde_client($id_user)
    {
        $sql = "select sold from user where id = $id_user";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function liste_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}