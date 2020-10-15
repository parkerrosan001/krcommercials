<?php

class UserModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchAllUsers()
    {

        $this->db->select("accounts_tbl.email,accounts_tbl.status,users_tbl.*");
        $this->db->from('accounts_tbl')
            ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
        $this->db->where('role', 'User');
        $this->db->order_by("users_tbl.acc_id", "desc");
        $result = $this->db->get();

        $users_data =  $result->result();

        if (!empty($users_data)) {

            return $users_data;
        } else {

            return false;
        }
    }

    public function fetchSingleCustomer($acc_id)
    {

        $this->db->select("accounts_tbl.email,accounts_tbl.status,users_tbl.*");
        $this->db->from('accounts_tbl')
            ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
        $this->db->where('accounts_tbl.id', $acc_id);
        $result = $this->db->get();
        $user_data =  $result->row();

        if (!empty($user_data)) {

            return $user_data;
        } else {

            return false;
        }
    }

    public function updateUser($user_data, $account_data, $user_id)
    {

        $result = $this->db->update('accounts_tbl', $account_data, array('id' => $user_id));

        if ($result == true) {

            $result1 = $this->db->update('users_tbl', $user_data, array('acc_id' => $user_id));
            return true;
        } else {

            return false;
        }
    }

    public function enableUser($data, $acc_id)
    {

        $result = $this->db->update('accounts_tbl', $data, array('id' => $acc_id));

        if ($result == true) {

            return true;
        } else {

            return false;
        }
    }

    public function disableUser($data, $acc_id)
    {

        $result = $this->db->update('accounts_tbl', $data, array('id' => $acc_id));

        if ($result == true) {

            return true;
        } else {

            return false;
        }
    }
}
