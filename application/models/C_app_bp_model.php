<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_app_bp_model extends My_Model
{
    private $table;

    public function __construct()
    {
        $this->table = 'c_app_bp';
    }

    public function GetEarliestBp($member_id, $date)
    {
        $field = 'min(measure_at) as measure_at';
        $where = array(
            'member_id' => $member_id,
            'measure_at >=' => $date.' 04:00:00',
            'measure_at <=' => $date.' 11:59:59',
        );
        $this->db->select($field);
        $this->db->from($this->table);
        $this->db->where($where);
        $res = $this->db->get()->result_array();
        $sql = $this->db->last_query();
        echo $sql;
        var_dump($res);

    }
}