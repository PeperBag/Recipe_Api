<?php
class Get{
    protected $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
    public function getRecipes()
    {
        $sqlString = "SELECT * FROM recipe_tbl";

        $data = array();
        $errmsg = "";
        $code = 0;

        try {
            if ($result = $this->pdo->query($sqlString)->fetchALL()) {
                foreach ($result as $record) {
                    array_push($data, $record);
                }
                $result = null;
                $code = 200;
                return array("code" => $code, "data" => $data);
            } else {
                $errmsg = "No data found";
                $code = 404;
            }
        } catch (\PDOException $e) {
            $errmsg = $e->getMessage();
            $code = 403;
        }
        return array('code' => $code, 'errmsg' => $errmsg);
    }


public function getIngredient()
{
    return "This is an ingredient that is retrieved from the database";
}
}
?>