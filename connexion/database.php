<?php 
 
class Database 
{
    
    private static $dbHost = "185.98.131.148"; 
    private static $dbName = "agenc1532220";
    private static $dbUser = "agenc1532220";
    private static $dbUserpassword = "czkvvz13j5";
    
    private static $connection = null;

     public static function connect() 
     {
       
             try
        {
           self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,self::$dbUser,self::$dbUserpassword);   
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        } 
         
         return self::$connection;  
     }
    
      public static function disconnect()
      {
          self::$connection = null;
      }
}
 
Database::connect();
 

?> 










