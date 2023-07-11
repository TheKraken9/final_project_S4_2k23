<?php

class M_activite_sportive extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserer_activite_sportive($data)
    {
        $this->db->insert('activite_sportive', $data);
    }

    public function liste_activite_sportive()
    {
        $this->db->select('*');
        $this->db->from('activite_sportive');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_activite_sportive($id)
    {
        $this->db->select('*');
        $this->db->from('activite_sportive');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function supprimer($id)
    {
        $sql = "delete from activite_sportive where id = $id";
        $query = $this->db->query($sql);
    }

    public function modifier($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('activite_sportive', $data);
    }

    public function generer_activite_sportive($type)
    {
        $sql = "select * from activite_sportive where type = '$type'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}