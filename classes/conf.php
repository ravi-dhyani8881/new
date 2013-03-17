<?php
class AAConf {

    private $databaseURL = "localhost";
    private $databaseUName = "root";
    private $databasePWord = "root";
    private $databaseName = "prijal";

    function get_databaseURL() {
        return $this->databaseURL;
    }

    function get_databaseUName() {
        return $this->databaseUName;
    }

    function get_databasePWord() {
        return $this->databasePWord;
    }

    function get_databaseName() {
        return $this->databaseName;
    }

}
?>