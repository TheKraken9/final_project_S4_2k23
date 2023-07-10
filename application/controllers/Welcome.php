<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/samples/login');
	}

    public function backoffice()
    {
        $this->load->view('welcome_message');
    }

    public function frontoffice()
    {
        $this->load->view('front/index');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('pages/samples/login');
    }

    public function register()
    {
        $this->load->view('pages/samples/register');
    }

    public function about()
    {
        $this->load->view('front/about');
    }

    public function product()
    {
        $this->load->view('front/product');
    }

    public function product_detail()
    {
        $this->load->view('front/product-detail');
    }

    public function shoping_cart()
    {
        $this->load->view('front/shoping-cart');
    }

    public function blog()
    {
        $this->load->view('front/blog');
    }

    public function contact()
    {
        $this->load->view('front/contact');
    }

    public function submit()
    {
        $this->load->model('M_user');
        $data = array(
            'username' => $this->input->post('usr'),
            'email' => $this->input->post('mail'),
            'password' => $this->input->post('pwd'),
            'phone' => $this->input->post('tel'),
            'role' => 'user'
        );
        $this->M_user->register($data);
        $this->load->view('pages/samples/login');
    }

    public function login()
    {
        $this->load->model('M_user');
        $data = array(
            'email' => $this->input->post('mail'),
            'password' => $this->input->post('pwd')
        );
        $result = $this->M_user->login($data);
        if ($result) {
            $mail = $this->input->post('mail');
            $result = $this->M_user->read_user_information($mail);
            if ($result) {
                $session_data = array(
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                    'role' => $result[0]->role,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                if ($result[0]->role == 'admin') {
                    $this->load->view('welcome_message');
                } else {
                    $this->load->view('front/index');
                }
            }
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('pages/samples/login', $data);
        }
    }
}
