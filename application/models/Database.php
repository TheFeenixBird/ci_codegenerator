<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 18/05/2018
 */

class Database
{

    public $tableList = array();
    public $name;

    public function addTable($table){
        $this->tableList[] = $table;
    }

}