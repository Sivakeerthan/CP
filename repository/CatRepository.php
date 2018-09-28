<?php
if(defined('ROOT')){
    require_once ROOT.'../lib/Repository.php';
}
else{
    require_once '../lib/Repository.php';
}

class CatRepository extends Repository
{

    protected $tableName='subcat';

    public function readByCategory($category)
    {
        $query = "SELECT p.imgurl, p.title, u.uname FROM $this->tableName AS p JOIN user AS u ON p.user_id=u.uid WHERE category_id = (SELECT cid FROM category where category_name = ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $category);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;

    }
    public function readAllMen()
    {
        $query = "SELECT alcid, name, price, descr, cat_id  FROM alc_menu";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function readMenById($id)
    {
        $query = "SELECT * FROM alc_menu WHERE alcid = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern

        $row = $result->fetch_object();

        return $row;
    }
    public function  readAllTagMen(){
        $query = "SELECT date,m1_name,m1_descr,m1_price,m2_name,m2_descr,m2_price,th_name,th_descr,th_price  FROM tages_menu";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function readAllScat()
    {
        $query = "SELECT name, scatid,cat_id  FROM {$this->tableName}";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function readAllCat()
    {
        $query = "SELECT name, catid  FROM cat";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    public function insertALCMenu($cat,$name,$desc,$price){
        $query = "INSERT INTO alc_menu(name,price,descr,cat_id) VALUES (?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssi',$name,$price,$desc,$cat);
        if($statement->execute()) {
            // Anfrage an die URI /user weiterleiten (HTTP 302)
            return true;
        }
        else{

            throw new Exception($statement->error);
            print_r("Error:".$statement->error);
            return false;
        }
    }
    public function updateALCMenu($cat,$name,$desc,$price,$id){
        $query = "UPDATE alc_menu SET name = ?, price = ?, descr = ?, cat_id = ? WHERE alcid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssii',$name,$price,$desc,$cat,$id);
        if($statement->execute()) {
            // Anfrage an die URI /user weiterleiten (HTTP 302)
            return true;
        }
        else{

            throw new Exception($statement->error);
            print_r("Error:".$statement->error);
            return false;
        }
    }
    public function insertTagMenu($day,$m1_name,$m1_descr,$m1_price,$m2_name,$m2_descr,$m2_price,$th_name,$th_descr,$th_price){
        $query = "INSERT INTO tages_menu(date,m1_name,m1_descr,m1_price,m2_name,m2_descr,m2_price,th_name,th_descr,th_price) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssssssss',$day,$m1_name,$m1_descr,$m1_price,$m2_name,$m2_descr,$m2_price,$th_name,$th_descr,$th_price);
        if($statement->execute()) {
            // Anfrage an die URI /user weiterleiten (HTTP 302)
            return true;
        }
        else{

            throw new Exception($statement->error);
            print_r("M1-Error:".$statement->error);
            return false;
        }
    }
    public function deleteById($id)
    {
        $query = "DELETE FROM alc_menu WHERE alcid=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    public function menuContainsCat($catid){
        $query = "SELECT a.name FROM alc_menu AS a JOIN subcat AS s ON a.cat_id = s.scatid WHERE s.cat_id = ? ";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $catid);
        $statement->execute();
        $result = $statement->get_result();
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        if (!$result) {
            throw new Exception($statement->error);
            return false;
        }
        if($rows != null){
            return true;
        }
        if($rows == null){
            return false;
        }
    }
    public function menuContainsScat($scatid){
        $query = "SELECT name FROM alc_menu WHERE cat_id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $scatid);
        $statement->execute();
        $result = $statement->get_result();
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        if (!$result) {
            throw new Exception($statement->error);
            return false;
        }
        if($rows != null){
            return true;
        }
        if($rows == null){
            return false;
        }
    }
}


?>
