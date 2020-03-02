<?php
namespace Controller\models;

use Controller\db\components\QueryHelper;

class PostData
{
    protected $db;
    public  function __construct(QueryHelper $db)
    {
        $this->db=$db;
    }
    public function getAllPosts(){
        $posts=$this->db->getAll("posts");
        require_once  __DIR__."/../views/posts/index.view.php";
    }

    public function getOne($id){
        return $this->db->getOne("posts",$id);
    }

    public function store($data){
        $temp["datePublication"]=date("Y-m-d");
        $temp["title"]=date("title");
        $temp["description"]=date("description");
        $temp["photo"]=date("photo");
        $temp["id_user"]=rand(1,2);

        $this->db->store("posts",$temp);

    }
}