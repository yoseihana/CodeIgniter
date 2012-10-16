<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 16/10/12
 * Time: 16:15
 * To change this template use File | Settings | File Templates.
 */

class Membre extends CI_Controller {

    public function index()
    {
        $this->load->helper('form');
        $data['titre'] = 'Adopte un prof - connexion';
        $data['vue'] = $this->load->view('membre', $data, true);
        $this->load->view('layout', $data);
    }

    public function login()
    {
        $this->load->model('M_Membre');
        //Récupère un arrêt de données
        $data['mdp'] = $this->input->post('mdp');
        $data['email'] = $this->input->post('email');

        //Vérification si des données sont entrée
        if($this->M_Membre->verifier($data))
        {
            $this->session->set_userdata('logged_in', true);
            redirect('prof/lister');
        }
        else{
            redirect('error/mauvais_identifiant');
        }
    }

    public function unlogin()
    {
       // $loggedin = $this->session->userdata('loggedin');
        //unset($loggedin);

        //redirect('/prof/lister/');
        //redirect($this->session->flashdata('current_url'));
    }
}