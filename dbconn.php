<?php
    class DBconn {
        private $hostName;
        private $useName;
        private $password;
        private $dbName;
        public $conn;

        function __construct() {
            $this->hostName = 'localhost';
            $this->useName = 'root';
            $this->password = '';
            $this->dbName = 'bits_hien';
        }

        function connect() {
            $this->conn = mysqli_connect($this->hostName, $this->useName, $this->password, $this->dbName);
            if (!$this->conn) {
                exit ("ket noi that bai");
            } else {
                echo "";
            }
        }
         function insert ($table,$column, $values) {
             $sql = "INSERT INTO $table $column VALUES $values;";
             $insert = $this->conn->query($sql);
             if ($insert === TRUE) {
                 echo "insert successful<br>";
             }else {
                 echo "error:" .$this->conn->error;
             }
         }

        function delete($table,$column,$values) {
            $sql = "DELETE FROM $table WHERE $column = $values;";
            $result = $this->conn->query($sql);
            if ($result ===TRUE) {
                echo "delete sucessful<br>";
            }else {
                echo "error:".$this->conn->error;
            }
        }

        function update($table,$column,$values,$conditions) {
            $sql = "UPDATE $table SET $column = $values WHERE $conditions;";
            $update = $this->conn->query($sql);
            if ($update === TRUE) {
                echo "update successful<br>";
            }else 
                echo "error:". $this->conn->error;
        }

        function select($column,$table,$conditions) {
            $sql = "SELECT $column FROM $table WHERE $conditions;";
            // var_dump($sql);
            // die;
            $select = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($select);
            if($select ===TRUE){
                echo "";
            } else {
                echo "error:".$this->conn->error;
            }
            return $rows;
        }

        function selectAll($table,$conditions) {
            $sql = "SELECT * FROM $table WHERE $conditions;";
            $select = $this->conn->query($sql);
            return $select;
        }
    }
    
    // $conn1 = new DBconn();
    // $conn1->connect();
    // var_dump($conn1->conn);
    // $table1 = 'presenters';
    // $column1 = "(user_id, name, phone, email)";
    // $values1 = "(5,'Name of Reference','0978456789','hien@gmail.com')";
    // $values2 = "(5,'Name of Reference','0978456789','hien@gmail.com')";
    

    // $conn1->insert($table1,$column1,$values1);
    // $conn1->insert($table1,$column1,$values2);
    

    // $table2 = 'experience';
    // $column2 = "(user_id,company_name)";
    // $values2 = "(0,'Công ty CP Pico')";
    // $conn1->delete($table2,$column2,$values2);

    // $table3 = 'experience';
    // $column3 = "company_name";
    // $values3 ="'Công ty CP Pico'";
    // $conditions3 = "id = 12";$conn1 = new DBconn();
    // $conn1->update($table3,$column3,$values3,$conditions3);
    // $rows = $conn1->select($column1,$table1);
    // foreach ($rows as $row){
    //     var_dump($row);
    //     echo "<br>";
    // }
?>
