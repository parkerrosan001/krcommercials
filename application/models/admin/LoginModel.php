<?php

    class LoginModel extends CI_Model {
        function __construct() {
            parent::__construct();
        }

        public function adminLoginValidate($data){

            $this->db->select("accounts_tbl.*,admins_tbl.admin_full_name,admins_tbl.admin_pic");
            $this->db->from('accounts_tbl')
            ->join('admins_tbl', 'accounts_tbl.id = admins_tbl.acc_id' , 'left');
            $this->db->where($data);
            $result = $this->db->get();
            $admin_data =  $result->row();

            if(!empty($admin_data)){
                
                return $admin_data;
            }
            else{
                
                return false;
            }
        }
    }
