<?php

class Seventh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $this->load->view('pages/documentation/documentation');
    }

    public function documentation()
    {
        $this->load->view('pages/documentation/documentation');
    }
}