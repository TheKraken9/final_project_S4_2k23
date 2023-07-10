<?php

class Second extends CI_Controller
{
    public function index()
    {
        $this->load->view('pages/forms/basic_elements');
    }

    public function basic_elements()
    {
        $this->load->model('M_activite_sportive');
        $data['activite_sportive'] = $this->M_activite_sportive->liste_activite_sportive();
        $this->load->view('pages/forms/basic_elements', $data);
    }

    public function nouvelle_as()
    {
        $this->load->model('M_activite_sportive');
        $data = array(
            'name' => $this->input->post('nom'),
            'description' => $this->input->post('description'),
            'type' => $this->input->post('type'),
            'category' => $this->input->post('categorie')
        );
        $this->M_activite_sportive->inserer_activite_sportive($data);
        redirect('/index.php/Second/basic_elements');
    }

    public function as_nouvelle()
    {
        $this->load->view('pages/forms/as_nouvelle');
    }

    public function modifier()
    {
        $id = $this->input->get('id');
        $this->load->model('M_activite_sportive');
        $data['activite_sportive'] = $this->M_activite_sportive->get_activite_sportive($id);
        $this->load->view('pages/forms/modifier', $data);
    }

    public function supprimer()
    {
        $id = $this->input->get('id');
        $this->load->model('M_activite_sportive');
        $this->M_activite_sportive->supprimer($id);
        redirect('/index.php/Second/basic_elements');
    }

    public function confimer_modification()
    {
        $id = $this->input->post('id');
        $this->load->model('M_activite_sportive');
        $data = array(
            'name' => $this->input->post('nom'),
            'description' => $this->input->post('description'),
            'type' => $this->input->post('type'),
            'category' => $this->input->post('categorie')
        );
        $this->M_activite_sportive->modifier($id, $data);
        redirect('/index.php/Second/basic_elements');
    }
}