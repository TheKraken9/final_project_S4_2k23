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

    public function __construct() {
        parent::__construct();
        session_start();
    }

	public function index()
	{
		$this->load->view('pages/samples/login');
	}

    public function backoffice()
    {
        $this->load->model('M_user');
        $this->load->model('M_regime');
        $this->load->model('M_activite_sportive');
        $data['users'] = $this->M_user->liste_user();
        $data['regime'] = $this->M_regime->liste_aliment();
        $data['activite_sportive'] = $this->M_activite_sportive->liste_activite_sportive();
        $this->load->view('welcome_message', $data);
    }

    public function frontoffice()
    {
        $session = $_SESSION['logged_in'];
        $id = $session['id'];
        $this->load->model('M_user');
        $data['users'] = $this->M_user->get_user($id);
        $taille = $data['users'][0]->taille/100;
        $imc = $data['users'][0]->poids / ($taille * $taille);
        $data['imc'] = round($imc, 2);
        $_SESSION['imc'] = round($imc, 2);
        $this->load->view('front/index', $data);
    }

    public function logout()
    {
        $_SESSION['logged_in'] = null;
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
        $session = $_SESSION['logged_in'];
        $id = $session['id'];
        $this->load->model('M_regime');
        $data['regime'] = $this->M_regime->liste_proposition_regime($id);
        $this->load->view('front/my_diet', $data);
    }

    public function product_detail()
    {
        $this->load->view('front/product-detail');
    }

    public function shoping_cart()
    {
        $this->load->model('M_cm');
        $data['cm'] = $this->M_cm->liste_cm();
        $this->load->view('front/shoping-cart', $data);
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
            'genre' => $this->input->post('genre'),
            'date_naissance' => $this->input->post('dtn'),
            'taille' => $this->input->post('taille'),
            'poids' => $this->input->post('poids'),
            'phone' => $this->input->post('numero'),
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
                    'id' => $result[0]->id,
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                    'role' => $result[0]->role,
                    'sold' => $result[0]->sold,
                    'phone' => $result[0]->phone,
                    'genre' => $result[0]->genre,
                    'date_naissance' => $result[0]->date_naissance,
                    'taille' => $result[0]->taille,
                    'poids' => $result[0]->poids
                );
                // Add user data in session
                $_SESSION['logged_in'] = $session_data;
                if ($result[0]->role == 'admin') {
                    $this->load->model('M_user');
                    $this->load->model('M_regime');
                    $this->load->model('M_activite_sportive');
                    $data['users'] = $this->M_user->liste_user();
                    $data['regime'] = $this->M_regime->liste_aliment();
                    $data['activite_sportive'] = $this->M_activite_sportive->liste_activite_sportive();
                    $this->load->view('welcome_message', $data);
                } else {
                    redirect('/index.php/Welcome/frontoffice');
                }
            }
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('pages/samples/login', $data);
        }
    }

    public function commencer()
    {
        $this->load->view('front/commencer');
    }

    public function premium()
    {
        $this->load->model('M_cm');
        $data['cm'] = $this->M_cm->liste_cm();
        $datas['premium_credit'] = array();
        $i = 0;
        foreach ($data['cm'] as $cm) {
            $is_premium = $data['cm'][$i]->credit;
            $commence_par = substr($data['cm'][$i]->credit, 0, 2);
            if($commence_par == '11'){
                $datas['premium_credit'][$i] = $data['cm'][$i];
            }
            $i++;
        }
        //var_dump($datas['premium_credit']);die();
        $this->load->view('front/premium', $datas);
    }
}
