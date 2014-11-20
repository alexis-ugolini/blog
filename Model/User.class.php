<?php

class Model_User
{
    function __construct()
    {
        $this->db = new Helper_Database();
    }
    function getLastId()
    {
        $last = $this->db->queryOne("SELECT id FROM users ORDER BY date_crea DESC LIMIT 1");
        return $last['id'];
    }
    public function getUser($id=0)
    {
        if ($id==0 || !is_int($id) || $id<1) {
            $id = $this->getLastId();
        }
        $result = $this->db->queryOne("SELECT * FROM users WHERE id = :id", array('id'=>$id));
        if ($result == false) {
            $result = $this->db->queryOne("SELECT * FROM users WHERE id = :id", array('id'=>$this->getLastId()));
        }
        return $result;
    }
}