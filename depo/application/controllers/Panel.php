<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('AdresModel');
        $this->load->model('MusteriModel');
        $this->load->model('KargolarModel');
        $this->load->model('EskiDatalarModel');
        $this->load->model('AraclarModel');
    }



	public function index()
	{
        $data['get_merkez_kargo_adeti'] = $this->KargolarModel->get_merkez_kargo_adeti();
        $data['get_depo_için_yolda'] = $this->KargolarModel->get_depo_için_yolda();
        $data['get_depoda'] = $this->KargolarModel->get_depoda();
        $data['get_dagitimda'] = $this->KargolarModel->get_dagitimda();
        $data['get_tamamlandi'] = $this->KargolarModel->get_tamamlandi();

        $this->load->view('panel/include/header');
		$this->load->view('panel/index/index' , $data);
        $this->load->view('panel/include/footer');


	}
}
