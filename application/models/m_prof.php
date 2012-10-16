<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 16/10/12
 * Time: 10:19
 * To change this template use File | Settings | File Templates.
 */

class M_Prof extends CI_Model
{
    public function lister()
    {
        $this->db->select('profs.*, specs.nom as specialite, specs.spec_id as sspec_id');
        $this->db->from('profs');
        $this->db->join('specs', 'profs.spec_id = specs.spec_id');

        $query = $this->db->get();
        return $query->result();
    }

    public function voir($idProf)
    {
        $this->db->select('profs.*, specs.nom as specialite, specs.spec_id as sspec_id');
        $this->db->from('profs');
        $this->db->join('specs', 'profs.spec_id = specs.spec_id');
        $this->db->where('profs.prof_id', $idProf);

        $query = $this->db->get();
        return $query->row(); //On ne récupère qu'une seule donnée
    }

    public function listerSpec($idSpec){
        $this->db->select('profs.*, specs.nom as specialite, specs.spec_id as sspec_id');
        $this->db->from('profs');
        $this->db->join('specs', 'profs.spec_id = specs.spec_id');
        $this->db->where('specs.spec_id', $idSpec);

        $query = $this->db->get();
        return $query->result();
    }
}