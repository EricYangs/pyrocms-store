<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
class Store_settings {

	private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
	
	public function item($slug)
	{
		$this->ci->db->where('slug',$slug);
		$this->settings = $this->ci->db->get('store_settings');
		foreach($this->settings->result() as $this->setting)
		{
			return $this->setting->value;
		}
	}
	
	public function set_item($slug,$value)
	{
		$this->setting_data = array(
			'value' => $value
		);
		$this->ci->db->where('slug',$slug);
		$this->ci->db->update('store_settings',$this->setting_data);
		
	}
	
	public function settings_manager_retrieve($tab)
	{
		$this->ci->db->where('tab',$tab);
		$this->ci->db->where('gui','1');
		$this->settings = $this->ci->db->get('store_settings');
		return $this->settings;
	}
	
	public function settings_manager_store()
	{
		foreach($this->ci->input->post() as $this->post_key => $this->post_value )
		{
			$this->ci->db->where('slug',$this->post_key);
			$this->settings = $this->ci->db->get('store_settings');
			if($this->settings->num_rows()!=NULL)
			{
				$this->set_item($this->post_key,$this->post_value);
			}
		}
	}
	
	public function generate_dropdown($slug)
	{
		$this->ci->db->where('slug',$slug);
		$this->items = $this->ci->db->get('store_settings');
		$this->dropdown = array('Select' => 'Select');
		foreach($this->items->result() as $this->item)
		{
			$this->options = explode('|',$this->item->options);
			foreach($this->options as $this->option)
			{
				$this->temp = explode('=',$this->option);
				$this->dropdown[$this->temp[0]] = $this->temp[1];
			}
		}
		return $this->dropdown;
	}
	
	public function currency()
	{
		$this->ci->db->where('slug', 'currency');
		$this->settings = $this->ci->db->get('store_settings');
		foreach($this->settings->result() as $this->setting):
		
			$this->ci->db->where('currency_id', $this->setting->value);
			$this->currencies = $this->ci->db->get('store_currency');
			foreach($this->currencies->result() as $this->currency):
			
				return $this->currency->currency_name;
			
			endforeach;
		
		endforeach;
	}
}

/* End of file Someclass.php */