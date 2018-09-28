<?php
/**
 * Created by PhpStorm.
 * User: bvamas
 * Date: 19.04.2018
 * Time: 09:34
 */
require_once '../lib/Repository.php';
class PlaceRepository extends Repository
{
    protected $tableName = 'ort';
    public function readAll($max=1000)
    {
        $query = "SELECT * FROM {$this->tableName} ORDER BY plz,ort";

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
}