<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model('google_login_model');
	}
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->Usuarios_model->login($username, sha1($password));

		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url());
		}
		else{
			$data  = array(
				'id' => $res->id, 
				'nombre' => $res->nombres,
				'rol' => $res->rol_id,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

	//LOGIN DE GOOGLE
	function Glogin(){

	include_once APPPATH . "libraries/vendor/autoload.php";
   
   //crear cliente google
	 $google_client = new Google_Client();
	 $google_client->setClientId('1065284463756-7s7iujvlj4d66fslequgc50k4s97nfop.apps.googleusercontent.com'); //Define your ClientID
	 $google_client->setClientSecret('H0epeLe6t7kIN6yhh2HuT06b'); //Insertar Client Secret Key
	 $google_client->setRedirectUri('http://localhost:82/plusale/Auth/Glogin'); //INSERTA LA RUTA URI
	 $google_client->addScope('email');
	 $google_client->addScope('profile');
   

	 if(isset($_GET["code"]))
	 {
	  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
   
	  if(!isset($token["error"]))
	  {
	   $google_client->setAccessToken($token['access_token']);
   
	   $this->session->set_userdata('access_token', $token['access_token']);
   
	   $google_service = new Google_Service_Oauth2($google_client);
   
   /// AQUI ESTÁ LA CLAVE
	   $data = $google_service->userinfo->get();
	   $current_datetime = date('Y-m-d H:i:s');
   

	   if($this->google_login_model->Is_already_register($data['id']))
	   {
		//update data
		$user_data = array(
		 'first_name' => $data['given_name'],
		 'last_name'  => $data['family_name'],
		 'email_address' => $data['email'],
		 'profile_picture'=> $data['picture'],
		 'updated_at' => $current_datetime
		);
   
		$this->google_login_model->Update_user_data($user_data, $data['id']);
	   }
	   else
	   {
		//insert data
		$user_data = array(
		 'login_oauth_uid' => $data['id'],
		 'first_name'  => $data['given_name'],
		 'last_name'   => $data['family_name'],
		 'email_address'  => $data['email'],
		 'profile_picture' => $data['picture'],
		 'created_at'  => $current_datetime
		);
   
		$this->google_login_model->Insert_user_data($user_data);
	   }
	   $this->session->set_userdata('user_data', $user_data);
	   redirect(base_url()."dashboard");
	  }
	 }
  
	
	
	
	 //////datos de sesion 
	//  $login_button = '';
	//  if(!$this->session->userdata('access_token'))
	//  {
	//   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'asset/sign-in-with-google.png" /></a>';
   
	//   $data['login_button'] = $login_button;
	//   $this->load->view('google_login', $data);
	//  }
	 
	//  else
	//  {
	//   $this->load->view('google_login', $data);
	//  }
	
}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
