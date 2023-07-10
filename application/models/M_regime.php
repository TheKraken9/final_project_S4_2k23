<?php

class M_regime extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserer_regime($data)
    {
        $this->db->insert('aliment', $data);
    }

    public function liste_aliment()
    {
        $this->db->select('*');
        $this->db->from('aliment');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_aliment($id)
    {
        $this->db->select('*');
        $this->db->from('aliment');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function supprimer($id)
    {
        $sql = "delete from aliment where id = $id";
        $query = $this->db->query($sql);
    }

    public function modifier_aliment($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('aliment', $data);
    }
}