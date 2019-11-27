<?php
/*
 * Author: Xu Ding
 * website: www.startutorial.com
 *          www.the-di-lab.com
 */
class Polygon
{
    static $_dbHost     = 'localhost'; 
    static $_dbName     = 'polygon';   
    static $_dbUserName = 'root';  
    static $_dbUserPwd  = '';
     
    // get coordinates
    static public function getCoords()
    {
        return self::get();
    }
     
    // save coordinates
    static public function saveCoords($rawData)
    {
        self::save($rawData);
    }
     
    // save lat/lng to database
    static public function save ($data)
    {
        $con = mysqli_connect(self::$_dbHost, self::$_dbUserName, self::$_dbUserPwd, self::$_dbName);
         
        // connect to database
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
		else{
			echo "konek anjing";
		}
         
      //  mysqli_select_db(self::$_dbName, $con);
         
        // delete old data
        mysqli_query($con, "DELETE FROM points");
         
        // insert data
        mysqli_query($con, "INSERT INTO points (data) VALUES ($data)");
         
        // close connection
        mysqli_close($con);
    }  
     
    // get lat/lng from database
    static private function get()
    {  
        $con = mysqli_connect(self::$_dbHost, self::$_dbUserName, self::$_dbUserPwd, self::$_dbName);
         
        // connect to database
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        else{
			echo "konek goblog";
		} 
       // mysqli_select_db(self::$_dbName, $con);
         
        $result = mysqli_query($con, "SELECT * FROM points");
                 
        $data   = false;
         
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $data = $row['data'];
        }
         
        // close connection
        mysqli_close($con);     
         
        return $data;
    }
     
}