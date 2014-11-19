<?php

class Model_Post
{
    function __construct()
    {
        $this->db = new Helper_Database();
    }
    public function getPost($id=0)
    {
        if ($id == 0) {
            $last = $this->db->queryOne("SELECT id FROM posts ORDER BY date_crea DESC LIMIT 1");
            $id = $last['id'];
        }
        return $this->db->queryOne("SELECT * FROM posts WHERE id = :id", array('id'=>$id));
    }
}

