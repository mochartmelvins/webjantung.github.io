<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public function cekLogin()
  {
    //Jika tidak ada session (Username) maka alihkan ke controller login
    if (!$this->session->userdata('Username')) {
      redirect('authentication/Auth/login');
    }
  }
}
