<?php
namespace Controller\db\components;

class QueryHelper
{
    public $pdo;

    function __construct()
    {
        $config = require_once __DIR__ . "/../../../config.php";
        $this->pdo = connection::make($config);
    }

    public function getAll($table)
    {
        $sql = "Select * from $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }

    public function getRow($table, $id, $search = "id")
    {
        $sql = prepare("SELECT * FROM $table WHERE $search=:x");
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute(["x" => $id])) {
            return $stmt->fetch();
        };
        return null;
    }
    public function getOne($table,$id){
        $sql = "Select * from $table where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch();

    }
    public function insertRow($table, $data)
    {
        $f = array_keys($data);
        $fields = implode(",", $f);
        $values = implode(",:", $f);
        $sql = "insert into $table($fields)values($values)";
        $stmt = $this->pdo = prepare($sql);
        $stmt->execute($data);
    }

    public function updateRow($table, $data, $search = "x")
    {
        $fields = "";
        foreach ($data as $key => $v) {
            if ($key != $search) {
                $fields .= $key .= "=:" . $key .= ",";
            }
            $fields = rtrim($fields, ",");
        }
        $sql = "Update $table set $fields where $search=:x";
        $stmt = $this->pdo = prepare($sql);
        $stmt->execute($data);
    }
}
