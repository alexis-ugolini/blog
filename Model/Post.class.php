<?php

class Model_Post
{
    function __construct()
    {
        $this->db = new Helper_Database();
    }
    function getLastId()
    {
        $last = $this->db->queryOne("SELECT id FROM posts ORDER BY date_crea DESC LIMIT 1");
        return $last['id'];
    }
    public function getPost($id=0)
    {
        if ($id==0 || !is_int($id) || $id<1) {
            $id = $this->getLastId();
        }
        $result = $this->db->queryOne("SELECT * FROM posts WHERE id = :id", array('id'=>$id));
        if ($result == false) {
            $result = $this->db->queryOne("SELECT * FROM posts WHERE id = :id", array('id'=>$this->getLastId()));
        }
        return $result;
    }
    function getPosts($number=3, $first=1)
    {
        $result = $this->db->query("SELECT * FROM posts ORDER BY date_crea DESC LIMIT :limit OFFSET :offset", array('limit'=>$number, 'offset'=>($first-1)));
        if ($result == false) {
            $result = $this->db->query("SELECT * FROM posts ORDER BY date_crea DESC LIMIT :limit OFFSET :offset", array('limit'=>3, 'offset'=>0));
        }
        return $result;
    }
}