<?php

class Fourth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $this->load->view('pages/tables/basic-table');
    }

    public function basic_table()
    {
        $this->load->view('pages/tables/basic-table');
    }
}