<?php
class Guardian extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert('guardian', $data);
    }

    public function update($data, $id)
    {
        $this->db->update('guardian', $data, array('userID' => $id));
    }

    public function get_guardian($uid)
    {
        $this->db->from('guardian');
        $this->db->where('guardian.userID',$uid);
        $query = $this->db->get();
        return $query->result();
    }
}