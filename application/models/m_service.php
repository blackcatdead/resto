<?php

class m_service extends CI_Model {


	function allUsaha()
	{
		$data = $this -> db -> get('usaha');
		return $data -> result_array();
	}

	function tambahUsaha($par)
	{
		$this -> db -> trans_start();
		$this -> db -> insert('usaha', $par);
		$this -> db -> trans_complete();
		return $this -> db -> trans_status();
	}

	function login($par)
	{
	
		$data = $this-> db ->get_where('user', $par, 1, 0);
		return $data -> result_array();
	}

	function dataUser($par)
	{
		
		$data = $this-> db ->get_where('user', $par, 1, 0);
		return $data -> result_array();
	}

	function belum_dikonfirm()
	{
		$this-> db ->where('status','2');
		$this-> db ->order_by('id_order','desc');
		$data = $this-> db ->get('order');
		return $data -> result_array();
	}

	function konfirmasi($par)
	{
		$this->db->where('id_order', $par['id_order']);
		$data = $this->db->update('order', $par);
		return $data;
	}


	function orderHariIni($par)
	{
		$datestring = "%Y-%m-%d";
		$time = time();

		$datetime = mdate($datestring, $time);

		$this->db->where("DATE_FORMAT(datetime,'%Y-%m-%d') = "."'".$datetime."'",NULL,FALSE);
		if(!empty($par['id_user_fk']))
		{
			$this->db->where('id_user_fk',$par['id_user_fk']);	
		}
		$data = $this->db->count_all_results('order');
		return $data;
	}

	function order($par)
	{
		$datestring = "%Y-%m-%d";
		$time = time();

		$datetime = mdate($datestring, $time);
		//$par['datetime']=$datetime;
		//$this->db->where("DATE_FORMAT(datetime,'%Y-%m-%d') = "."'".$datetime."'",NULL,FALSE);
		//$this-> db ->where('id_user_fk', $par['id_user_fk']);
		//$data = $this-> db ->get_where('ordera', $par, null, null);
		$this-> db ->where('status','0');
		$this-> db ->order_by('id_order','desc');
		$data = $this-> db ->get('order');

		return $data -> result_array();
	}

	function detail_order($par)
	{
		$this->db->select('detail_order.id_detail_order, id_menu_fk, id_order_fk, quantity, catatan, subtotal, menu.nama, detail_order.status' );
		$this->db->where('id_order_fk', $par['id_order_fk']);
		$this->db->join('menu', 'detail_order.id_menu_fk = menu.id_menu');
		$data = $this-> db ->get('detail_order');
		return $data -> result_array();
	}
	

	function tambahOrder($par)
	{
		$data = $this->db->insert('order', $par);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}



	function hapusOrder($par)
	{
		$this -> db -> trans_start();
		$par2['id_order_fk']=$par['id_order'];
		$this->db->delete('detail_order', $par2);

		$this->db->delete('order', $par);
		//$insert_id = $this->db->insert_id();
		 $this->db->trans_complete();
		return $this -> db -> trans_status();
	}

	function hapusDetailOrder($par)
	{
		$this -> db -> trans_start();

		$this->db->delete('detail_order', $par);
		//$insert_id = $this->db->insert_id();
		 $this->db->trans_complete();
		return $this -> db -> trans_status();
	}



	function ubahOrder($par)
	{
		$this->db->where('id_order', $par['id_order']);
		$data = $this->db->update('order', $par);
		return $data;
	}

	function tambahDetailOrder($par)
	{
		$data = $this->db->insert('detail_order', $par);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


	
	function ubahDetailOrder($par)
	{
		$id_detail_order=$par['id_detail_order'];
		unset($par['id_detail_order']);
		$this->db->where('id_detail_order', $id_detail_order);
		$data = $this->db->update('detail_order', $par);
		return $data;
	}

	function menu($par)
	{
		$data = $this-> db ->get_where('menu', $par, 1, 0);
		return $data -> result_array();
	}

	function makanan()
	{
		$this->db->where('jenis', "1");
		$data = $this -> db -> get('menu');
		return $data -> result_array();
	}

	function minuman()
	{
		$this->db->where('jenis', "2");
		$data = $this -> db -> get('menu');
		return $data -> result_array();
	}
}
?>




