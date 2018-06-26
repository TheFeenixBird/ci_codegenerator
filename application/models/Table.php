<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 18/05/2018
 */

class Table
{

    public $fieldList = array();
    public $name;
    public $flexName;
    public $comment;

    public function addField ($field){
        $this->fieldList[] = $field;
}


}