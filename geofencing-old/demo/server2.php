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
         
        mysqli_select_db($con, self::$_dbName);
         
        // delete old data
        //mysqli_query($con, "DELETE FROM points");
         
        // insert data
        $sql =("INSERT INTO points (data) VALUES ('$data')");
        
		//$sql = "INSERT INTO points (data) VALUES ('$data')";

	/*	if ($con->mysql_query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	*/	
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		
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
 
        mysqli_select_db($con, self::$_dbName);
         
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