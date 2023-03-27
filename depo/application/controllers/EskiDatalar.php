<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EskiDatalar extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('AdresModel');
        $this->load->model('MusteriModel');
        $this->load->model('KargolarModel');
        $this->load->model('EskiDatalarModel');
    }


    public function index()
    {
        $data['getdatas'] = $this->EskiDatalarModel->getdatas();
        $this->load->view('panel/include/header');
        $this->load->view('panel/eskidatalar/index' , $data);
        $this->load->view('panel/include/footer');
    }


   }