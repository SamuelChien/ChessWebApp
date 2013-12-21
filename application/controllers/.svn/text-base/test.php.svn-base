<?php

class Test extends CI_Controller {
     
    function index() {
        $data['title'] = "Game";
        $this->load->view('test');
    }
    function getUser1($matchID, $userID){
        $this->load->model('match_model');
        $match = $this->match_model->get($matchID);
        if ($match->user1_id == $userID)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }
    function insertGameboard($matchID){
        $boardString = $this->input->post('json');
        $this->load->model('match_model');
        $this->match_model->updateBoard($matchID, $boardString);
    }
    function getBoardState($matchID){
        $this->load->model('match_model');
        $match = $this->match_model->get($matchID);
        echo $match->board_state;
    }
 }

