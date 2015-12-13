<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_service');
	}

	public function index()
	{
		echo 'login : '.'<a href='.site_url('/servicecontroller/login?username=admin&password=admin&status=1').'>'.site_url('/servicecontroller/login?username=admin&password=admin&status=1').'</a>';
		echo '</br>'.'orderHariIni : '.'<a href='.site_url('/servicecontroller/orderHariIni').'>'.site_url('/servicecontroller/orderHariIni').'</a>';
		echo '</br>'.'orderHariIni : '.'<a href='.site_url('/servicecontroller/orderHariIni?id_user_fk=1').'>'.site_url('/servicecontroller/orderHariIni?id_user_fk=1').'</a>';
		echo '</br>'.'order : '.'<a href='.site_url('/servicecontroller/order?status=0').'>'.site_url('/servicecontroller/order?status=0').'</a>';
		echo '</br>'.'tambahOrder : '.'<a href='.site_url('/servicecontroller/tambahOrder?id_user_fk=1&nama_pemesan=joki&no_meja=19&status=0').'>'.site_url('/servicecontroller/tambahOrder?id_user_fk=1&nama_pemesan=joki&no_meja=19&status=0').'</a>';
		echo '</br>'.'tambahDetailOrder : '.'<a href='.site_url('/servicecontroller/tambahDetailOrder?id_order_fk=5&id_menu_fk=1&quantity=3&catatan=tidak%20pedas&subtotal=30000&status=0').'>'.site_url('/servicecontroller/tambahDetailOrder?id_order_fk=5&id_menu_fk=1&quantity=3&catatan=tidak%20pedas&subtotal=30000&status=0').'</a>';
		echo '</br>'.'hapusDetailOrder : '.'<a href='.site_url('/servicecontroller/hapusDetailOrder?id_detail_order=3').'>'.site_url('/servicecontroller/hapusDetailOrder?id_detail_order=3').'</a>';
		echo '</br>'.'detailOrder : '.'<a href='.site_url('/servicecontroller/detailorder?id_order_fk=2').'>'.site_url('/servicecontroller/detailorder?id_order_fk=2').'</a>';



		
		http://localhost/ws_resto/index.php/servicecontroller/hapusDetailOrder?id_detail_order=3
	}

	public function login()
	{
		$data=$this->input->get();
		$data['password']=md5($data['password']);
		$res = $this->m_service->login($data);
		$response = json_encode($res);
		echo $response;
	}

	public function logout()
	{
		echo 'logout';
	}

	public function belum_dikonfirm()
	{
		$data=$this->input->get();
		$res = $this->m_service->belum_dikonfirm($data);

		$id= ((isset($res[0]['id_order'])==true) ? ($res[0]['id_order']) : "0");

		//$response = json_encode($res);
		//echo $response;
		echo $id;
	}

	public function konfirmasi()
	{
		$data=$this->input->get();
		$res = $this->m_service->konfirmasi($data);

		$response = json_encode($res);
		echo $response;
	}

	public function dataUser()
	{
		$data=$this->input->get();
		$res = $this->m_service->dataUser($data);
		$response = json_encode($res);
		echo $response;
	}

	public function orderHariIni()
	{
		$data=$this->input->get();
		$res = $this->m_service->orderHariIni($data);

		echo $res;
	}

	public function order()
	{
		$data=$this->input->get();
		$res = $this->m_service->order($data);
		$response = json_encode($res);
		echo $response;
	}

	public function detailOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->detail_order($data);
		$response = json_encode($res);
		echo $response;
	}


	
	public function menu()
	{
		$data=$this->input->get();
		$res = $this->m_service->menu($data);
		$response = json_encode($res);
		echo $response;
	}
	public function makanan()
	{
		
		$res = $this->m_service->makanan();
		$response = json_encode($res);
		echo $response;
	}

	public function minuman()
	{
		$res = $this->m_service->minuman();
		$response = json_encode($res);
		echo $response;
	}



	public function tambahOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->tambahOrder($data);
		echo $res;
	}

	public function hapusOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->hapusOrder($data);
		echo $res;


	}

	public function ubahOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->ubahOrder($data);
		echo $res;
	}

	public function tambahDetailOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->tambahDetailOrder($data);
		echo $res;
	}

	public function hapusDetailOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->hapusDetailOrder($data);
		echo $res;
	}

	public function ubahDetailOrder()
	{
		$data=$this->input->get();
		$res = $this->m_service->ubahDetailOrder($data);
		echo $res;
	}
}
