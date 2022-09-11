<?php
include("classes/databaseConnectionClass.php");

class FirmDatabase extends DatabaseConnection{
  public $user;
  public $rights;

    public function __construct() {
        parent::__construct();
    }

    public function createUser(){
        if(isset($_POST["register"])) {
            $currentTimeStamp = strtotime("now");
            $date = date("Y-m-d", $currentTimeStamp);
            $user = array(
                "vardas" => $_POST["name"],
                "pavarde" => $_POST["surname"],
                "slapyvardis" => $_POST["username"],
                "slaptazodis" => $_POST["password"],
                "teises_ID" => "5",
                "registracijos_data" => $date,
                "paskutinis_prisijungimas" => $date
            );
            $user["vardas"] = '"' . $user["vardas"] . '"';
            $user["pavarde"] = '"' . $user["pavarde"] . '"';     
            $user["slapyvardis"] = '"' . $user["slapyvardis"] . '"';
            $user["slaptazodis"] = '"' . $user["slaptazodis"] . '"';
            $user["teises_ID"] = '"' . $user["teises_ID"] . '"';
            $user["registracijos_data"] = '"' . $user["registracijos_data"] . '"'; 
            $user["paskutinis_prisijungimas"] = '"' . $user["paskutinis_prisijungimas"] . '"'; 
            $userExists=$this->checkIfExists("vartotojai", "slapyvardis", $_POST['username']);
            if(count($userExists) == 1) {
                echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-danger text-white'><h5 class='card-title text-white'>Sorry!</h5><p>This username is already taken!</p></div></div></div>";
                return;
            }
            $this->insertAction("vartotojai", ["vardas", "pavarde", "slapyvardis", "slaptazodis", "teises_ID","registracijos_data","paskutinis_prisijungimas"],
            [$user["vardas"], $user["pavarde"], $user["slapyvardis"], $user["slaptazodis"],  $user["teises_ID"], $user["registracijos_data"], $user["paskutinis_prisijungimas"]]);
            echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-success text-white'><h5 class='card-title text-white'>Success!</h5><p>Head over to login page!</p></div></div></div>";
        }
    }

    public function getUsers() {
        $this->user= $this->selectWithJoin("vartotojai", "vartotojai_teises","teises_ID", "id", "LEFT JOIN",["vartotojai.id", "vartotojai.vardas", "vartotojai.pavarde", "vartotojai.slapyvardis", "vartotojai_teises.aprasymas as teises_ID", "vartotojai.slaptazodis", "vartotojai.registracijos_data","vartotojai.paskutinis_prisijungimas"]);

        foreach ($this->user as $display) {
            echo "<tr>";
            echo "<td>".$display["id"]."</td>";
            echo "<td>".$display["vardas"]."</td>";
            echo "<td>".$display["pavarde"]."</td>";
            echo "<td>".$display["slapyvardis"]."</td>";
            echo "<td>".$display["teises_ID"]."</td>";
            echo "<td>".$display["slaptazodis"]."</td>";
            echo "<td>".$display["registracijos_data"]."</td>";
            echo "<td>".$display["paskutinis_prisijungimas"]."</td>";
            echo "<td>";
            echo "<form method='POST' class='text-center'>";
            echo "<input type='hidden' name='id' value='".$display["id"]."'>";
            echo "<button class='btn btn-danger' type='submit' name='delete'>DELETE</button>";
            echo "<a href='index.php?page=userUpdate&id=".$display["id"]."' class='btn btn-success'>EDIT</a>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    }

    public function deleteUsers() {
        if(isset($_POST["delete"])) {
            $this->deleteAction("vartotojai", $_POST["id"]);
        }
    }

    public function selectOneUser() {
        $user = $this->selectOneAction("vartotojai", $_GET["id"]);
        return $user;
    }

    public function editUsers() {
        if(isset($_POST["edit"])) {
            $user = array(
                "vardas" => $_POST["vardas"],
                "pavarde" => $_POST["pavarde"],
                "slapyvardis" => $_POST["slapyvardis"],
                "teises_ID" => $_POST["teises_ID"],
                "slaptazodis" => $_POST["slaptazodis"]
            );
            $this->updateAction("vartotojai", $_POST["id"] , $user);
            header("location: index.php?page=vartotojai");
        }
    }

    public function logIntoSite() {
        if(isset($_POST["login"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $this->login($username, $password);
            if(!empty($login) && $login[0]['slapyvardis']== $username && $login[0]['slaptazodis']==$password){
                $_SESSION["rankName"] = $login[0]['aprasymas'];
                $_SESSION["username"] = $login[0]['slapyvardis'];
                header("Location: index.php");
                exit();
            }
        }
    }

    public function getRights() {
        $this->rights = $this->selectAction("vartotojai_teises","id","ASC");
        return $this->rights;
    }
    

    // negalejau ant login rodyti erroru ir siusti zmogu i kita puslapi su ta pacia funkcija
    public function displayLoginError(){
        if(isset($_POST["login"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $this->login($username, $password);
            if(!empty($login)){
                if($login[0]['slapyvardis']== $username && $login[0]['slaptazodis']!=$password){
                    echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-danger text-white'><h5 class='card-title text-white'>Ooops!</h5><p>Your password is incorrect</p></div></div></div>";
                } else {
                    echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-danger text-white'><h5 class='card-title text-white'>Ooops!</h5><p>This user doesn't exist!</p></div></div></div>";
                }
            } else {
                echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-danger text-white'><h5 class='card-title text-white'>Ooops!</h5><p>This user doesn't exist!</p></div></div></div>";
            }
        }
    }
}
?>