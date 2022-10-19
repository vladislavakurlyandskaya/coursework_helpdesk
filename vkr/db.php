<?php
class db {

    function __construct()
    {
        global $dbh;
        if (!is_null($dbh)) return;
        $dbh = mysqli_connect('localhost:8889', 'root', 'root', 'test');
        mysqli_query($dbh,'SET NAMES utf8');
    }

    function select_list($query)
    {
        $dbh = mysqli_connect('localhost:8889', 'root', 'root', 'test');
        $q = mysqli_query($dbh, $query);
        if (!$q) return null;
        $ret = array();
        while ($row = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
            array_push($ret, $row);
        }
        mysqli_free_result($q);
        return $ret;
    }
}
?>