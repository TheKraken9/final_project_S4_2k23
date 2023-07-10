<?php

class First extends CI_Controller
{
    public function index()
    {
        $this->load->view('pages/ui-features/buttons');
    }

    public function buttons()
    {
        $this->load->view('pages/ui-features/buttons');
    }

    public function dropdowns()
    {
        $this->load->view('pages/ui-features/dropdowns');
    }

    public function typography()
    {
        $this->load->view('pages/ui-features/typography');
    }

    public function nouveau_aliment()
    {
        $this->load->model('M_regime');
        $data = array(
            'name' => $this->input->post('nom'),
            'price' => $this->input->post('prix'),
            'type' => $this->input->post('type'),
            'category' => $this->input->post('categorie')
        );
        $this->M_regime->inserer_regime($data);
        redirect('/index.php/First/liste_aliment');
    }

    public function liste_aliment()
    {
        $this->load->model('M_regime');
        $data['aliment'] = $this->M_regime->liste_aliment();
        $this->load->view('pages/ui-features/dropdowns', $data);
    }

    public function modifier()
    {
        $id = $this->input->get('id');
        $this->load->model('M_regime');
        $data['aliment'] = $this->M_regime->get_aliment($id);
        $this->load->view('pages/ui-features/modifier', $data);
    }

    public function supprimer()
    {
        $id = $this->input->get('id');
        $this->load->model('M_regime');
        $this->M_regime->supprimer($id);
        redirect('/index.php/First/liste_aliment');
    }

    public function modifier_aliment()
    {
        $id = $this->input->post('id');
        $this->load->model('M_regime');
        $data = array(
            'name' => $this->input->post('nom'),
            'price' => $this->input->post('prix'),
            'type' => $this->input->post('type'),
            'category' => $this->input->post('categorie')
        );
        $this->M_regime->modifier_aliment($id, $data);
        redirect('/index.php/First/liste_aliment');
    }
}