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

    public function generer_regime($type)
    {
        $sql = "select * from aliment where type = '$type'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function inserer_regime_activite($data)
    {
        $this->db->insert('proposition_regime', $data);
    }

    public function inserer_regime_activite_imc($data)
    {
        $this->db->insert('proposition_regime_imc', $data);
    }

    public function liste_proposition_regime($id)
    {
        $sql = "select * from proposition_regime where user_id =" . $id . " and date = CURDATE()";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function liste_proposition_regime_imc($id)
    {
        $sql = "select * from proposition_regime_imc where user_id =" . $id . " and date = CURDATE()";
        $query = $this->db->query($sql);
        return $query->result();
    }
}