<?php

class Third extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $this->load->view('pages/charts/chartjs');
    }

    public function chartjs()
    {
        $this->load->view('pages/charts/chartjs');
    }

    public function cm_demande()
    {
        $this->load->model('M_cm');
        $data['cm_request'] = $this->M_cm->liste_cm_request();
        $this->load->view('pages/charts/cm_demande', $data);
    }

    public function cm_liste()
    {
        $this->load->model('M_cm');
        $data['cm'] = $this->M_cm->liste_cm();
        $this->load->view('pages/charts/cm_liste', $data);
    }

    public function cm_nouveau()
    {
        $this->load->view('pages/charts/cm_nouveau');
    }

    public function nouveau_cm()
    {
        $this->load->model('M_cm');
        $data = array(
            'credit' => $this->input->post('code'),
            'tarif' => $this->input->post('tarif')
        );
        $this->M_cm->inserer_cm($data);
        redirect('/index.php/Third/cm_liste');
    }

    public function confirmer()
    {
        $id = $this->input->get('id');
        $id_user = $this->input->get('user');
        $this->load->model('M_cm');
        $this->load->model('M_user');
        $result = $this->M_cm->verifier_existance($id);
        $credit = $result[0]->credit;
        $res = $this->M_cm->est_libre($credit);
        if(empty($res))
        {
            $this->M_cm->confirmer($id);
            $tarif = $this->M_cm->get_tarif($credit);
            $this->M_user->ajouter_tarif($tarif[0]->tarif, $id_user);
            redirect('/index.php/Third/cm_demande');
        }
        else
        {
            redirect('/index.php/Third/cm_demande');
        }
    }

    public function refuser()
    {
        $id = $this->input->get('id');
        $this->load->model('M_cm');
        $this->M_cm->refuser($id);
        redirect('/index.php/Third/cm_demande');
    }

    public function modifier()
    {
        $id = $this->input->get('id');
        $this->load->model('M_cm');
        $data['cm'] = $this->M_cm->get_cm($id);
        $this->load->view('pages/charts/modifier', $data);
    }

    public function supprimer()
    {
        $id = $this->input->get('id');
        $this->load->model('M_cm');
        $this->M_cm->supprimer($id);
        redirect('/index.php/Third/cm_liste');
    }

    public function confirmer_modification()
    {
        $id = $this->input->post('id');
        $this->load->model('M_cm');
        $data = array(
            'credit' => $this->input->post('code'),
            'tarif' => $this->input->post('tarif')
        );
        $this->M_cm->confirmer_modification($id, $data);
        redirect('/index.php/Third/cm_liste');
    }

    public function inserer_request()
    {
        $this->load->model('M_cm');
        $session = $_SESSION['logged_in'];
        $id = $session['id'];
        $data = array(
            'user_id' => $id,
            'credit' => $this->input->post('code')
        );
        $this->M_cm->check_exist($data);
        redirect('/index.php/Welcome/frontoffice');
    }
}