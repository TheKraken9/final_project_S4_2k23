<?php

class Fiveth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $this->load->view('pages/icons/mdi');
    }

    public function mdi()
    {
        $this->load->view('pages/icons/mdi');
    }
}