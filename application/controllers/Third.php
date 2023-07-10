<?php

class Third extends CI_Controller
{
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
        $this->load->model('M_cm');
        $this->M_cm->confirmer($id);
        redirect('/index.php/Third/cm_demande');
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
}