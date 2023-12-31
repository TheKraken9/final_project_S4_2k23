<?php

class M_cm extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserer_cm($data)
    {
        $this->db->insert('money_virtuel', $data);
    }

    public function liste_cm()
    {
        $this->db->select('*');
        $this->db->from('money_virtuel');
        $query = $this->db->get();
        return $query->result();
    }

    public function liste_cm_request()
    {
       $sql = "select cm_request.id as id, user.username as user, user.id as id_user, cm_request.credit as credit, cm_request.state as state from cm_request join user on cm_request.user_id = user.id";
         $query = $this->db->query($sql);
        return $query->result();
    }

    public function verifier_existance($id)
    {
        $sql = "select credit from cm_request where id = $id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function est_libre($credit)
    {
        $sql = "select * from cm_request where credit = $credit and state = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function confirmer($id)
    {
        $sql = "update cm_request set state = 1 where id = $id";
        $query = $this->db->query($sql);
    }

    public function refuser($id)
    {
        $sql = "update cm_request set state = 2 where id = $id";
        $query = $this->db->query($sql);
    }

    public function get_cm($id)
    {
        $sql = "select * from money_virtuel where id = $id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_tarif($credit)
    {
        $sql = "select tarif from money_virtuel where credit = $credit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function confirmer_modification($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('money_virtuel', $data);
    }

    public function supprimer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('money_virtuel');
    }

    public function inserer_request($data)
    {
        $this->db->insert('cm_request', $data);
    }

    public function check_exist($data)
    {
        $this->db->select('*');
        $this->db->from('money_virtuel');
        $this->db->where('credit', $data['credit']);
        $query = $this->db->get();
        $result = $query->result();
        if (empty($result)) {
            redirect('/index.php/Welcome/shoping_cart');
        } else {
            $this->inserer_request($data);
        }
    }
}