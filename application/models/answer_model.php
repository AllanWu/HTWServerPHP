<?php

class Answer_model extends My_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_answer_without_user($field='*',$where)
	{	
		$this->db->order_by('answer_time','ASC');	
		$this->db->select($field);
		return $this->db->where($where)->get('answer');
	}
	
	function get_answer($field='*',$where)
	{	
		$this->db->order_by('answer_time','ASC');	
		$this->db->join('user','answer.user_id = user.user_id');
		$this->db->select($field);
		return $this->db->where($where)->get('answer');
	}
	
    function get_answer_count($where)
    {
        return $this->db->where($where)->count_all_results('answer');
    }
    
	function insert_answer($data)
	{
		$this->db->insert('answer',$data);
		return $this->db->insert_id();
	}
	
	function update_answer($where,$data)
	{
		return $this->db->where($where)->update('answer',$data);	
	}
	
	function delete_answer($where)
	{
		return $this->db->where($where)->update('answer');	
	}
}