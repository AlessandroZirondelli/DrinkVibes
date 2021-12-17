<?php 
class DatabaseHelper{
    private $db;

    public function __construct($servername,$username,$password,$dbname,$port){
        //connessione al DB
        $this->db = new mysqli($servername,$username,$password,$dbname,$port);
        if($this->db->connect_error){
            die("Connection failed");
        }
    }

    //Qui verranno inserite tutte le query e le insert di cui abbiamo bisogno


}
?>