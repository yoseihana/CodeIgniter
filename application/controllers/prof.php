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

        $uriSegement = $this->uri->segment(3);

        if($uriSegement == 'spec'){

            $idspec = $this->uri->segment(4);

            $dataList['profs'] = $this->M_Prof->listerSpec($idspec);

        }else{
            $dataList['profs'] = $this->M_Prof->lister(); //Va reprendre les données SQL demander dans m_prof et la methode lister
        }

        $dataLayout['vue'] = $this->load->view('lister_profs', $dataList, true); //True = récupérer la vue comme une chaine de caractère, on envoie les vues à chargée
        $dataLayout['titre'] = 'Accueil';
        $this->load->view('layout', $dataLayout); //Charger la vue finale
    }

    public function voir()
    {
        $this->load->model('M_Prof');
        $id_prof = $this->uri->segment(3);

        $dataProf['prof']=$this->M_Prof->voir($id_prof);
        $dataLayout['titre'] = 'Fiche '.$dataProf['prof']->nom.' '.$dataProf['prof']->prenom;

        $dataLayout['vue'] = $this->load->view('voir_prof', $dataProf, true);

        $this->load->view('layout', $dataLayout);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */