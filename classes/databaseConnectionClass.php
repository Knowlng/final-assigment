<?php

class DatabaseConnection {
    private $host ="localhost";
    private $user = "root";
    private $password = "";
    private $database = "final";

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->conn->exec("set names utf8");
            // echo "Prisijungta prie duomenu bazes sekmingai";
        } catch(PDOException $e) {
            echo "Prisijungti nepavyko: ".$e->getMessage();
        }
    }


    public function insertAction($table, $cols, $values) {

        $cols = implode(",", $cols);
        $values = implode(",", $values);

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "INSERT INTO `$table` ($cols) VALUES ($values)";
            $this->conn->exec($sql);
            // echo "Pavyko sukurti nauja irasa";

        } catch (PDOException $e) {
            echo "Nepavyko sukurti naujo iraso: " . $e->getMessage();
        }

    }

    public function selectWithJoin($table1, $table2, $table1RelationCol, $table2RelationCol, $join, $cols, $sort) {
        $cols = implode(",", $cols);
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT $cols FROM $table1 
            $join $table2
            ON $table1.$table1RelationCol = $table2.$table2RelationCol
            $sort";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e) {
            return "Nepavyko vykdyti uzklausos: " . $e->getMessage();
        }
    }

    public function selectWithJoin3($table1, $table2, $table3, $table1RelationCol, $table2RelationCol, $table1RelationCol2, $table3RelationCol, $join, $join2, $cols, $sort) {
        $cols = implode(",", $cols);
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT $cols FROM $table1 
            $join $table2
            ON $table1.$table1RelationCol = $table2.$table2RelationCol
            $join2 $table3
            ON $table1.$table1RelationCol2 = $table3.$table3RelationCol
            $sort";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e) {
            return "Nepavyko vykdyti uzklausos: " . $e->getMessage();
        }
    }

    public function deleteAction($table, $id) {
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM `$table` WHERE id = $id";
            $this->conn->exec($sql);
            // echo "Pavyko istrinti irasa";
        }
        catch(PDOException $e) {
            echo "Nepavyko istrinti iraso: " . $e->getMessage();
        }
    }

    public function updateAction($table, $id, $data) {
        $cols = array_keys($data);
        $values = array_values($data);

        $dataString = [];
        for ($i=0; $i<count($cols); $i++) {
           $dataString[] = $cols[$i] . " = '" . $values[$i]. "'";
        }
        $dataString = implode(",", $dataString);

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `$table` SET $dataString WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            // echo "Pavyko atnaujinti irasa";
        } 
        catch(PDOException $e) {
            echo "Nepavyko atnaujinti iraso: " . $e->getMessage();
        }
    }

    public function selectAction($table, $col, $sortDir) {
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `$table`
            ORDER BY `$table`.`$col` $sortDir";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;

        } catch(PDOException $e) {
            return "Nepavyko vykdyti uzklausos: " . $e->getMessage();
        }
    }

    public function selectOneAction($table, $id) {
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `$table` WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        } catch(PDOException $e) {
            return "Nepavyko vykdyti uzklausos: " . $e->getMessage();
        }
    }

    public function login($username, $password){

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "SELECT vartotojai.ID, vartotojai.slapyvardis, vartotojai.slaptazodis, vartotojai_teises.aprasymas FROM vartotojai
            LEFT JOIN vartotojai_teises
            ON vartotojai.teises_ID = vartotojai_teises.ID
            WHERE slapyvardis ='$username' OR slaptazodis = '$password'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e) {
            echo "Prisijungti nepavyko: " . $e->getMessage();
        }
    }

    public function checkIfExists($table, $col, $data){
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "SELECT 1 FROM $table WHERE $col = '$data'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e) {
            echo "Prisijungti nepavyko: " . $e->getMessage();
        }
    }


    public function __destruct() {
        $this->conn=null;
        // echo "Atsijungta sekmingai";
    }
}
?>
