<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 16/10/12
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */
class M_Membre extends CI_Model
{
    public function verifier($data)
    {
        $query = $this->db->get_where('membres', array('email'=>$data['email'], 'mdp'=>$data['mdp']));
        return $query->num_rows();
    }

}