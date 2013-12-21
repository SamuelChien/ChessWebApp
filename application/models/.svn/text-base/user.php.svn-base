<?php
/************************************************************
 *
 * Connect 4
 *
 * Copyright 2013. All Rights Reserved.
 * This file may not be redistributed in whole or part.
 *
 * Application: Connect 4Web App
 * user.php
 *
 ************************************************************/
class User extends CI_Model {

	const OFFLINE = 1;
	const AVAILABLE = 2;
	const WAITING = 3;
	const INVITED = 4;
	const PLAYING = 5;
	
	
	public $id;
	public $login;
	public $first;
	public $last;
	public $password;   // hashed version
	public $salt;
	public $email;	
	public $user_status_id = User::OFFLINE;
	public $invite_id;
	public $match_id;

	public function __construct()
    {
        parent::__construct();
    }
	
	public function encryptPassword($clearPassword) {
		$this->salt = mt_rand();
		$this->password = sha1($this->salt . $clearPassword);
	}
	
	
	// Initializes the password to a random value
	public function initPassword() {
		$this->salt = mt_rand();
		$clearPassword = mt_rand();
		$this->password = sha1($this->salt . $clearPassword);
		return $clearPassword;	
	}
	
	public function comparePassword($clearPassword) {
		if ($this->password == sha1($this->salt . $clearPassword))
			return true;	
		return false;
	}
	
	public function fullName() {
		return $this->first . " " . $this->last;
	}
	
	public function logged_in()
    {
        if ($this->session->userdata('logged_in'))
        {
            return true;
        }
        return false;
    }
}