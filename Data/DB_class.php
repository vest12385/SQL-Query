<?php

class DB 
{
    var $_dbConn = 0;
    var $_queryResource = 0;
    
    function DB()
    {
        //do nothing
    }
    
    function connect_db($host, $user, $password, $dbname)
    {
        $dsn = "mysql:host=$host; dbname=$dbname; charset=utf8";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dbConn = new PDO($dsn, $user, $password, $options);
        if (! $dbConn)
            die ("MySQL Connect Error");
        $this->_dbConn = $dbConn;
        return true;
    }
    
    function query($sql)
    {   
        try{
            $sth = $this->_dbConn->prepare( $sql );
            $sth->execute();
            $this->_queryResource = $sth;
            return $sth;
        }catch( PDOException $e ) {
            echo "Sytan error" . $e -> getMessage();
        }
    }
    
    function userFetch( $fetchStyle )
    {
        return $this->_queryResource->fetch( $fetchStyle );
    }
    function getMetadata( $number )
    {
        $result = array();
        $result = $this->_queryResource->getColumnMeta( $number );
        return $result["name"];
    }
    function getColumnLen(  )
    {
        return $this->_queryResource->columnCount();
    }
}
?>