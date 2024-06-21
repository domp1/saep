<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motorista extends CI_Controller {
	
	public function index(){
		$this->logar();
	}
	
	public function logar(){
		$this->load->view('view_navbar');
		$this->load->view('view_topo');
        $this->load->view('view_logar');
        $this->load->view('view_rodape');
	}
	
	public function verificar_login(){
		$dados = $this->input->post();
		$this->load->model('Motorista_model');
		if($this->Motorista_model->motorista_cadastrado($dados['email'],$dados['senha'])){
			$motorista=$this->Motorista_model->get_motorista($dados['email'], $dados['senha']);
			
			$this->principal($motorista);
		} else{
			$data['msg']="Usuário ou senha incorretos!";
			$this->load->view('view_topo');
			$this->load->view('view_logar', $data);
			$this->load->view('view_rodape');
		}
		
	}
	
	public function principal($motorista){
		$this->load->model('Motorista_model');
		
		//Navbar com nome do motorista
		$nome=$motorista[0]->{'nome'};
		$id=$motorista[0]->{'idmotoristas'};
		$dado['motorista']=$nome;
		$dado['id']=$id;
		$this->load->view('view_navbar', $dado);
		
		$this->load->view('view_topo');
		
		//Listagem das viagens na página
		$viagens = $this->Motorista_model->get_viagens($id);
		$data['viagens']= $viagens;
		$this->load->view('view_listar', $data);
		
        $this->load->view('view_rodape');
	}
	
	public function gastos($viagem_id){
		$this->load->model('Motorista_model');
		
		$data['gastos']=$this->Motorista_model->get_gastos($viagem_id);
		$data['viagem']=$this->Motorista_model->get_viagem($viagem_id);
		$viagem=$this->Motorista_model->get_viagem($viagem_id);
		
		$id_motorista = $viagem->{'motoristas_idmotoristas'};
		$motorista=$this->Motorista_model->get_motoristas($id_motorista);
		$nome = $motorista[0]->{'nome'};
		$data['motorista']=$nome;
		$this->load->view('view_navbar', $data);
		$this->load->view('view_topo');
		$this->load->view('view_gastos', $data);
		$this->load->view('view_rodape');
	}
	
	public function excluir($viagem){
		$this->load->model('Motorista_model');
		$chave=$this->Motorista_model->get_viagem($viagem);
		$id_motorista = $chave->{'motoristas_idmotoristas'};
		
		$motorista=$this->Motorista_model->get_motoristas($id_motorista);
		$nome = $motorista[0]->{'nome'};
		$data['motorista']=$nome;

		$gastos=$this->Motorista_model->get_gastos($viagem);
		if (count($gastos) >= 1) {
			// echo "
			// <script type=\"text/javascript\">
			// alert(\"Este cliente não pode ser apagado, pois possui gastos.\");
			// </script>";
			$this->load->view('view_navbar', $data);
			$this->load->view('view_topo');
			$data['viagem']=$viagem;
			$this->load->view('proibido_exclusao', $data);
			$this->load->view('view_rodape');
			// $this->principal($motorista); 
			
		}else{
			
			$this->load->view('view_navbar', $data);
			$this->load->view('view_topo');
			$data['viagem']=$viagem;
			$this->load->view('confirmar_exclusao', $data);
			$this->load->view('view_rodape');
		}	
	}
	public function proibido_exclusao($id){
		$dados = $this->input->post();
		$this->load->model('Motorista_model');
		$viagem=$this->Motorista_model->get_viagem($id);
		$id_motorista = $viagem->{'motoristas_idmotoristas'};
		$motorista=$this->Motorista_model->get_motoristas($id_motorista);
		$this->principal($motorista);
	}

	public function confirmar_exclusao($id){
		$dados = $this->input->post();
		$this->load->model('Motorista_model');
		$viagem=$this->Motorista_model->get_viagem($id);
		$id_motorista = $viagem->{'motoristas_idmotoristas'};
		
		$motorista=$this->Motorista_model->get_motoristas($id_motorista);
		if($dados['botao']=="sim"){
			$this->Motorista_model->delete($id);
		}
		$this->principal($motorista);
	}
		

	// public function registrar_gastos($id){
	// 	$this->load->model('Motorista_model');
	// 	$data['viagem']=$this->Motorista_model->get_viagem($id);
		
	// 	$this->load->view('view_topo');
	// 	$this->load->view('view_editar',$data);
	// 	$this->load->view('view_rodape');
	// }
}