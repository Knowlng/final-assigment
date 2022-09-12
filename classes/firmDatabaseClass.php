<?php
include("classes/databaseConnectionClass.php");
include("classes/userInterface.php");

class FirmDatabase extends DatabaseConnection{
  public $user;
  public $rights;
  public $settings;
  public $clients;
  public $cRights;
  public $firms;

    public function __construct() {
        parent::__construct();
    }

    public function createUser($reg0Crt1){
        if(isset($_POST["register"])) {
            $currentTimeStamp = strtotime("now");
            $date = date("Y-m-d", $currentTimeStamp);
            if($reg0Crt1==0){
                $user = array(
                    "vardas" => $_POST["name"],
                    "pavarde" => $_POST["surname"],
                    "slapyvardis" => $_POST["username"],
                    "slaptazodis" => $_POST["password"],
                    "teises_ID" => $_POST["teises_ID"],
                    "registracijos_data" => $date,
                    "paskutinis_prisijungimas" => $date
                );
            } else {
                $user = array(
                    "vardas" => $_POST["name"],
                    "pavarde" => $_POST["surname"],
                    "slapyvardis" => $_POST["username"],
                    "slaptazodis" => $_POST["password"],
                    "teises_ID" => "5",
                    "registracijos_data" => $date,
                    "paskutinis_prisijungimas" => $date
                );
            }
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
            if($reg0Crt1==1){
                echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-success text-white'><h5 class='card-title text-white'>Success!</h5><p>Head over to login page!</p></div></div></div>";
            } else {
                echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-success text-white'><h5 class='card-title text-white'>Success!</h5><p>New user has been added!</p></div></div></div>";
            }
        }
    }

    public function getUsers($title) {
        if($title==1){
            $this->user= $this->selectWithJoin("vartotojai", "vartotojai_teises","teises_ID", "id", "LEFT JOIN",["vartotojai.id", "vartotojai.vardas", "vartotojai.pavarde", "vartotojai.slapyvardis", "vartotojai_teises.aprasymas as teises_ID", "vartotojai.slaptazodis", "vartotojai.registracijos_data","vartotojai.paskutinis_prisijungimas"], "ORDER BY `vartotojai`.`ID` ASC");
        } else if($title==2 || $title==3) {
            $this->user= $this->selectWithJoin("vartotojai", "vartotojai_teises","teises_ID", "id", "LEFT JOIN",["vartotojai.id", "vartotojai.vardas", "vartotojai.pavarde", "vartotojai.slapyvardis", "vartotojai_teises.aprasymas as teises_ID", "vartotojai.registracijos_data","vartotojai.paskutinis_prisijungimas"],"ORDER BY `vartotojai`.`ID` ASC");
        }
        foreach ($this->user as $display) {
            echo "<tr>";
            echo "<td>".$display["id"]."</td>";
            echo "<td>".$display["vardas"]."</td>";
            echo "<td>".$display["pavarde"]."</td>";
            echo "<td>".$display["slapyvardis"]."</td>";
            echo "<td>".$display["teises_ID"]."</td>";
            if(empty($display["slaptazodis"])) {
                echo "<td>*****</td>";
            } else {
                echo "<td>".$display["slaptazodis"]."</td>";
            }
            echo "<td>".$display["registracijos_data"]."</td>";
            echo "<td>".$display["paskutinis_prisijungimas"]."</td>";
            echo "<td>";
            if($title==1){
                echo "<form method='POST' class='text-center'>";
                echo "<input type='hidden' name='id' value='".$display["id"]."'>";
                echo "<button class='btn btn-danger' type='submit' name='delete'>DELETE</button>";
                echo "<a href='index.php?page=userUpdate&id=".$display["id"]."' class='btn btn-success'>EDIT</a>";
                echo "</form>";
            } else if($title==2) {
                echo "<form method='POST' class='text-center'>";
                echo "<input type='hidden' name='id' value='".$display["id"]."'>";
                echo "<button class='btn btn-danger' type='submit' name='delete'>DELETE</button>";
                echo "</form>";
            } else if($title==3) {
              
            }
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

    public function getUsersRights() {
        $this->rights = $this->getRights();
        foreach ($this->rights as $display) {
            echo "<tr>";
            echo "<td>".$display["ID"]."</td>";
            echo "<td>".$display["pavadinimas"]."</td>";
            echo "<td>".$display["aprasymas"]."</td>";
            echo "<form method='POST' class='text-center'>";
            echo "<td>";
            echo "<input type='hidden' name='id' value='".$display["ID"]."'>";
            echo "<button class='btn btn-danger' type='submit' name='deleteRight' onclick='return confirm(\"Are you sure?\")'>DELETE</button>";
            echo "<a href='index.php?page=userRightUpdate&id=".$display["ID"]."' class='btn btn-success'>EDIT</a>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    }

    public function deleteRight() {
        if(isset($_POST["deleteRight"])) {
            $this->deleteAction("vartotojai_teises", $_POST["id"]);
        }
    }

    public function createUserRights(){
        if(isset($_POST["createRight"])) {
                $rights = array(
                    "pavadinimas" => $_POST["pavadinimas"],
                    "aprasymas" => $_POST["aprasymas"]
                );
            $rights["pavadinimas"] = '"' . $rights["pavadinimas"] . '"';
            $rights["aprasymas"] = '"' . $rights["aprasymas"] . '"';     
            $this->insertAction("vartotojai_teises", ["pavadinimas", "aprasymas"],[$rights["pavadinimas"], $rights["aprasymas"]]);
            echo "<div class='container mt-4'><div class='m-auto main-card mb-3 card w-25 text-center'><div class='card-body bg-success text-white'><h5 class='card-title text-white'>Success!</h5><p>New user right has been created!</p></div></div></div>";
            header("location: index.php?page=userRights");
        }
    }

    public function selectOneRight() {
        $right = $this->selectOneAction("vartotojai_teises", $_GET["id"]);
        return $right;
    }

    public function editUsersRights() {
        if(isset($_POST["editRight"])) {
            $right = array(
                "pavadinimas" => $_POST["pavadinimas"],
                "aprasymas" => $_POST["aprasymas"]
            );
            $this->updateAction("vartotojai_teises", $_POST["id"] , $right);
            header("location: index.php?page=userRights");
        }
    }

    public function getClients($title) {
        $this->clients= $this->selectWithJoin3("klientai", "klientai_teises", "imones", "teises_id", "ID", "imones_id", "id", "LEFT JOIN", "LEFT JOIN", ["klientai.id", "klientai.vardas", "klientai.pavarde", "klientai_teises.reiksme as teises_id", "klientai.aprasymas", "imones.pavadinimas as imones_id", "klientai.pridejimo_data"], "ORDER BY `klientai`.`ID` ASC");
        foreach ($this->clients as $display) {
            echo "<tr>";
            echo "<td>".$display["id"]."</td>";
            echo "<td>".$display["vardas"]."</td>";
            echo "<td>".$display["pavarde"]."</td>";
            echo "<td>".$display["teises_id"]."</td>";
            echo "<td>".$display["aprasymas"]."</td>";
            echo "<td>".$display["imones_id"]."</td>";
            echo "<td>".$display["pridejimo_data"]."</td>";
            echo "<td>";
            if($title==1){
                echo "<form method='POST' class='text-center'>";
                echo "<input type='hidden' name='id' value='".$display["id"]."'>";
                echo "<button class='btn btn-danger' type='submit' name='deleteClient'>DELETE</button>";
                echo "<a href='index.php?page=clientUpdate&id=".$display["id"]."' class='btn btn-success'>EDIT</a>";
                echo "</form>";
            } else if($title==3) {
              
            }
            echo "</td>";
            echo "</tr>";
        }
    }

    public function createClient(){
        if(isset($_POST["createClient"])) {
            $currentTimeStamp = strtotime("now");
            $date = date("Y-m-d", $currentTimeStamp);
            $client = array(
                "vardas" => $_POST["vardas"],
                "pavarde" => $_POST["pavarde"],
                "teises_id" => $_POST["teises_ID"],
                "aprasymas" => $_POST["aprasymas"],
                "imones_id" => $_POST["imones_id"],
                "pridejimo_data" => $date
            );
            $client["vardas"] = '"' . $client["vardas"] . '"';
            $client["pavarde"] = '"' . $client["pavarde"] . '"';     
            $client["teises_id"] = '"' . $client["teises_id"] . '"';
            $client["aprasymas"] = '"' . $client["aprasymas"] . '"';
            $client["imones_id"] = '"' . $client["imones_id"] . '"';
            $client["pridejimo_data"] = '"' . $client["pridejimo_data"] . '"'; 
            $this->insertAction("klientai", ["vardas", "pavarde", "teises_id", "aprasymas", "imones_id","pridejimo_data"],
            [$client["vardas"], $client["pavarde"], $client["teises_id"], $client["aprasymas"],  $client["imones_id"], $client["pridejimo_data"]]);
            header("location: index.php?page=klientai");
        }
    }

    public function deleteClient() {
        if(isset($_POST["deleteClient"])) {
            $this->deleteAction("klientai", $_POST["id"]);
        }
    }
    public function selectOneClient() {
        $client = $this->selectOneAction("klientai", $_GET["id"]);
        return $client;
    }

    public function getClientRights() {
        $this->cRights = $this->selectAction("klientai_teises","id","ASC");
        return $this->cRights;
    }

    public function editClient() {
        if(isset($_POST["editClient"])) {
            $client = array(
                "vardas" => $_POST["vardas"],
                "pavarde" => $_POST["pavarde"],
                "teises_id" => $_POST["teises_ID"],
                "aprasymas" => $_POST["aprasymas"],
                "imones_id" => $_POST["imones_id"]
            );
            $this->updateAction("klientai", $_POST["id"] , $client);
            header("location: index.php?page=klientai");
        }
    }

    public function getFirms() {
        $this->firms = $this->selectAction("imones","id","ASC");
        return $this->firms;
    }

    public function logIntoSite() {
        if(isset($_POST["login"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $this->login($username, $password);
            if(!empty($login) && $login[0]['slapyvardis']== $username && $login[0]['slaptazodis']==$password){
                if($login[0]['aprasymas'] == "administratorius"){
                    $user = new Admin();
                } else if($login[0]['aprasymas'] == "sistemos administratorius"){
                    $user = new S_Admin();
                } else if($login[0]['aprasymas'] == "vadybininkas"){
                    $user = new Vadyb();
                } else if($login[0]['aprasymas'] == "inspektorius"){
                    $user = new Inspek();
                } else if($login[0]['aprasymas'] == "vartotojas"){
                    $user = new Vart();
                }
                $_SESSION["rights"] = serialize($user);
                $_SESSION["rankName"] = $login[0]['aprasymas'];
                $_SESSION["username"] = $login[0]['slapyvardis'];
                $currentTimeStamp = strtotime("now");
                $date = date("Y-m-d", $currentTimeStamp);
                $user = array(
                    "paskutinis_prisijungimas" => $date
                );
                $this->updateAction("vartotojai",$login[0]['ID'], $user);
                header("Location: index.php");
                exit();
            }
        }
    }

    public function getRights() {
        $this->rights = $this->selectAction("vartotojai_teises","id","ASC");
        return $this->rights;
    }

    public function saveSettings(){
        if(isset($_POST["saveSettings"])){
            $this->settings = $this->selectAction("settings","id","ASC");
            foreach($this->settings as $setting) {
                echo isset($_POST["registerCheckbox"]);
                // if($_POST["registerCheckbox"]) {
                //     $setting = 0;
                // } else {
                //     $setting = 1;
                // }
                // $settings = array(
                //     "TrueOrFalse" => $setting
                // );
                $this->updateAction("settings", $setting['ID'] , $settings);
            }
            // header("location: index.php?page=adminsettings");
        }
    }

    public function getSettings() {
        $settings= $this->selectAction("settings","id", "ASC");   
        return $settings;
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