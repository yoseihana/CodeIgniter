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
        //Url mémorisée
        $this->session->set_flashdata('current_url', current_url());

        $this->load->model('M_Prof');

        $uriSegement = $this->uri->segment(3);

        if($uriSegement == 'spec'){

            $idspec = $this->uri->segment(4);
            $dataList['profs'] = $this->M_Prof->listerSpec($idspec);
            $dataList['titre'] = 'Adopte un prof - liste des profs de ' . $dataList['profs'][0]->specialite;

        }else{
            $dataList['profs'] = $this->M_Prof->lister(); //Va reprendre les données SQL demander dans m_prof et la methode lister
            $dataList['titre'] = 'Liste de tous les profs';
        }

        $dataList['deja_adoptes'] = $this->session->userdata('deja_adoptes');

        $dataLayout['vue'] = $this->load->view('lister', $dataList, true); //True = récupérer la vue comme une chaine de caractère, on envoie les vues à chargée
        $this->load->view('layout', $dataLayout); //Charger la vue finale
    }

    public function voir()
    {
        $this->session->set_flashdata('current_url', current_url());

        $this->load->model('M_Prof');
        $id_prof = $this->uri->segment(3);

        $dataProf['prof']=$this->M_Prof->voir($id_prof);
        $dataLayout['titre'] = 'Fiche '.$dataProf['prof']->nom.' '.$dataProf['prof']->prenom;
        $dataProf['deja_adoptes'] = $this->session->userdata('deja_adoptes');

        $dataLayout['vue'] = $this->load->view('voir', $dataProf, true);

        $this->load->view('layout', $dataLayout);
    }

    public function adopte()
    {
        $id = $this->uri->segment(3);
        $this->load->model('M_Prof');

        $prof = $this->M_Prof->voir($id);

        //Regarde si un prof a déjà été adopté, récupère les infos via userdata dans la session
        $deja_adopte = $this->session->userdata('deja_adoptes') ? $this->session->userdata('deja_adoptes') : array();
        $deja_adopte[$id] = $prof;

       //Enregistre dans la session avec set_userdata -> on a enregistrer le prof adopter
        $this->session->set_userdata(array('deja_adoptes'=>$deja_adopte));

        //Redirection car pas de vue
        //redirect('/prof/lister/');
        redirect($this->session->flashdata('current_url'));

    }

    public function libere()
    {
        $id = $this->uri->segment(3);
        $deja_adopte = $this->session->userdata('deja_adoptes');
        unset($deja_adopte[$id]);

        //Supprime tout ce qui avait déjà été adopté
        $this->session->unset_userdata('deja_adoptes');

        //Re création du tableau deja_adoptes avec les éléments qui restent
        $this->session->set_userdata('deja_adoptes', $deja_adopte);
        //redirect('/prof/lister/');
        redirect($this->session->flashdata('current_url'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */