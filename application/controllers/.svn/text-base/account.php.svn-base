<?php
/************************************************************
 *
 * Connect 4
 *
 * Copyright 2013. All Rights Reserved.
 * This file may not be redistributed in whole or part.
 *
 * Application: Connect 4Web App
 * account.php
 *
 ************************************************************/
class Account extends CI_Controller {
     
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
	    	session_start();
    }
    
	/**
     * Enforce access control to protected functions.
     */
    public function _remap($method, $params = array()) {
	    	// enforce access control to protected functions	

    		$protected = array('updatePasswordForm','updatePassword','index','logout');
    		
    		if (in_array($method,$protected) && !isset($_SESSION['user']))
   			redirect('account/loginForm', 'refresh'); //Then we redirect to the index page again
 	    	
	    	return call_user_func_array(array($this, $method), $params);
    }
          
    /**
     * Load the login form.
     */
    function loginForm() {
        // if($this->user->logged_in())
        // {
        //     redirect('arcade/index', 'refresh');
        // }
        $data['title'] = "Login";
        $this->load->view('account/loginForm', $data);
    }
    
	/**
     * Login.
     */
    function login() {
        // if($this->user->logged_in())
        // {
        //     redirect('arcade/index', 'refresh');
        // }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Login";
            $data['status'] = "error";
            $data['message'] = "Form Validation Fails!";
        	$this->load->view('account/loginForm', $data);
        }
        else
        {
            $login = $this->input->post('username');
            $clearPassword = $this->input->post('password');
             
            $this->load->model('user_model');

            $user = $this->user_model->get($login);
             
            if (isset($user) && $user->comparePassword($clearPassword)) {
            	$_SESSION['user'] = $user;
            	$data['user']=$user;
            	$this->user_model->updateStatus($user->id, User::AVAILABLE);
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('name', $_SESSION['user']->fullName());
            	redirect('arcade/index', 'refresh'); //redirect to the main application page
            }
            else {
                $data['title'] = "Login";
                $data['status'] = "error";
                $data['message'] = "Incorrect username or password!";
            	$this->load->view('account/loginForm',$data);
            }
        }
    }

	/**
     * Logout.
     */
    function logout() {
        $user = $_SESSION['user'];
        $this->load->model('user_model');
        $this->user_model->updateStatus($user->id, User::OFFLINE);
        session_destroy();
        $this->session->set_userdata('logged_in', NULL);
        $data['title'] = "Login";
        $data['status'] = "success";
        $data['message'] = "Successfully Logout!";
        $this->load->view('account/loginForm', $data);
    }

	/**
     * Load a new form.
     */
    function newForm() {
        // if($this->user->logged_in())
        // {
        //     redirect('arcade/index', 'refresh');
        // }
        $data['title'] = "Create";
        $this->load->view('account/newForm', $data);
    }
    
	/**
     * Create new account.
     */
    function createNew() {
    		$this->load->library('form_validation');
    	    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.login]');
	    	$this->form_validation->set_rules('password', 'Password', 'required');
	    	$this->form_validation->set_rules('first', 'First', "required");
	    	$this->form_validation->set_rules('last', 'last', "required");
	    	$this->form_validation->set_rules('email', 'Email', "required|is_unique[user.email]");
	    	
	    
	    	if ($this->form_validation->run() == FALSE)
	    	{
                $data['title'] = "Create";
                $data['status'] = "error";
                $data['message'] = "Form Validation Fails!";
	    		$this->load->view('account/newForm');
	    	}
	    	else  
	    	{
	    		$user = new User();
	    		 
	    		$user->login = $this->input->post('username');
	    		$user->first = $this->input->post('first');
	    		$user->last = $this->input->post('last');
	    		$clearPassword = $this->input->post('password');
	    		$user->encryptPassword($clearPassword);
	    		$user->email = $this->input->post('email');
	    		
	    		$this->load->model('user_model');
	    		 
	    		
	    		$error = $this->user_model->insert($user);
	    		$data['title'] = "Login";
                $data['status'] = "success";
                $data['message'] = "Successfully Created Account!";
	    		$this->load->view('account/loginForm');
	    	}
    }

    
	/**
     * Load form to update password.
     */
    function updatePasswordForm() {
        $data['title'] = "Change";
	    $this->load->view('account/updatePasswordForm');
    }
    
	/**
     * Update password.
     */
    function updatePassword() {
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
	    	$this->form_validation->set_rules('newPassword', 'New Password', 'required');
	    	 
	    	 
	    	if ($this->form_validation->run() == FALSE)
	    	{
                $data['title'] = "Change";
                $data['status'] = "error";
                $data['message'] = "Form Validation Fails!";
	    		$this->load->view('account/updatePasswordForm');
	    	}
	    	else
	    	{
	    		$user = $_SESSION['user'];
	    		
	    		$oldPassword = $this->input->post('oldPassword');
	    		$newPassword = $this->input->post('newPassword');
	    		 
	    		if ($user->comparePassword($oldPassword)) {

                    $_SESSION['user'] = $user;
                    $data['user']=$user;
	    			$user->encryptPassword($newPassword);
	    			$this->load->model('user_model');
	    			$this->user_model->updatePassword($user);
	    			
                    $data['title'] = "Connect";
                    $data['status'] = "success";
                    $data['message'] = "Successfully Change Password!";
                    $this->load->view('arcade/mainPage',$data);
	    		}
	    		else {
                    $data['title'] = "Change";
                    $data['status'] = "error";
                    $data['message'] = "Incorrect password!";
	    			$this->load->view('account/updatePasswordForm',$data);
	    		}
	    	}
    }
    
	/**
     * Load form for recovering password.
     */
    function recoverPasswordForm() {
        $data['title'] = "Recovery";
        $this->load->view('account/recoverPasswordForm', $data);
    }
    
	/**
     * Recover password.
     */
    function recoverPassword() {
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('email', 'email', 'required');
	    	
	    	if ($this->form_validation->run() == FALSE)
	    	{
                $data['title'] = "Recovery";
                $data['status'] = "error";
                $data['message'] = "Form Validation Fails!";
	    		$this->load->view('account/recoverPasswordForm');
	    	}
	    	else
	    	{ 
	    		$email = $this->input->post('email');
	    		$this->load->model('user_model');
	    		$user = $this->user_model->getFromEmail($email);

	    		if (isset($user)) {
	    			$newPassword = $user->initPassword();
	    			$this->user_model->updatePassword($user);
	    			
                    $to = $user->fullName(). " <".$user->email.">"; 
                    $subject = "SmashBoard: Password Recovery";
                    $from = "From: SmashBoard <do-not-reply@smashboard.com>";
	    			$body = "Your new password is $newPassword";
                    mail($to, $subject, $body, $from);

	    			$data['title'] = "Recovery";
                    $data['status'] = "success";
                    $data['message'] = "Recovery Email Send Successfully";
                    $this->load->view('account/loginForm',$data);
	    		}
	    		else {
                    $data['title'] = "Recovery";
                    $data['status'] = "error";
                    $data['message'] = "No record exists for this email!";
	    			$this->load->view('account/recoverPasswordForm',$data);
	    		}
	    	}
    }    
 }

