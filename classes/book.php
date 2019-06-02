<?php

class book extends Db
{
    //select all data from he Database

    public function select()
    {
        $table = "books";
        $sql = "SELECT * FROM  $table";

        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectByCriteria($searchtype, $searchterm)
    {
        $searchtype = addslashes($searchtype);
        $searchterm = addslashes($searchterm);
        $table = "books";

        $sql = "SELECT * FROM $table WHERE $searchtype LIKE '%$searchterm%' ";;
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insert($fields)
    {
        $implodeColumns = implode(', ', array_keys($fields));
        $impplodePlaceholder = implode(', :', array_keys($fields));
        $table = "books";

        $sql = "INSERT INTO $table ($implodeColumns) VALUES (:" . $impplodePlaceholder . ")";

        $db = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $db->bindValue(':' . $key, $value);
        }

        $dbExec = $db->execute();

        if ($dbExec) {
            header('Location: index.php');
        }
    }

    public function delete($id)
    {
        $table = "books";
        $sql = "DELETE FROM $table WHERE id = :id";

        $db = $this->connect()->prepare($sql);
        $db->bindValue(":id", $id);
        $db->execute();
    }

}

?>