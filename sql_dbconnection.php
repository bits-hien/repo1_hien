<?php
    class DBConnection {
        private $hostName = 'localhost';
        private $userName = 'root';
        private $password = '';
        private $databaseName = 'bits_hien';
        
        public function connect(){
           $connect = mysqli_connect($this->hostName, $this->userName, $this->password, $this->databaseName);
        
            if (!$connect){
                echo ("Kết nối không thành công");
            } else{
                echo "Kết nối thành công";
            }
            return $connect;
        }
    } 
    
?>
