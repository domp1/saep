<?php
    class Motorista_model extends CI_Model {
        
        public function motorista_cadastrado($email, $senha){
            $this->db->where('email',$email);
            $this->db->where('senha',$senha);
            $query=$this->db->get('motoristas');
            return $query->num_rows();
        }
        
        public function get_viagens($id){
            $this->db->where('motoristas_idmotoristas',$id);
            $query=$this->db->get('viagens');
            return $query->result();
        }

        public function get_motoristas($id){
            $this->db->where('idmotoristas',$id);
            $query=$this->db->get('motoristas');
            return $query->result();
        }
        
        public function get_motorista($email, $senha){
            $this->db->where('email',$email);
            $this->db->where('senha',$senha);
            $query=$this->db->get('motoristas');
            return $query->result();
        }

        public function get_viagem($id){
            $this->db->where('idviagens',$id);
            $query = $this->db->get('viagens');
            return $query->result()[0];
        }

        public function get_gastos($id){
            $this->db->where('viagens_idviagens',$id);
            $query = $this->db->get('gastos');
            return $query->result();
        }


        public function delete($id){
            $this->db->where('idviagens',$id);
            $this->db->delete('viagens');
        }




        public function insert($dados){
            $this->db->insert('cliente',$dados);
        }

        public function update($dados){
            $this->db->where('id',$dados['id']);

            $this->db->update('cliente',$dados);
        }

    }
?>
