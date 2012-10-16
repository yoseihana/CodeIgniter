<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prof extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->lister();
	}

    public function lister()
    {
        $this->load->model('M_Prof');
        $dataList['profs'] = $this->M_Prof->lister(); //Va reprendre les données SQL demander dans m_prof et la methode lister

        $dataLayout['vue'] = $this->load->view('lister', $dataList, true); //True = récupérer la vue comme une chaine de caractère, on envoie les vues à chargée
        $dataLayout['titre'] = 'Accueil';
        $this->load->view('layout', $dataLayout); //Charger la vue finale
    }

    public function test()
    {
        $this->load->view('test');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */