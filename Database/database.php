<?php

    class Database
    {
        protected $objConnect = null;
        
        public function setObjConn()
        {
            $this->objConnect = mysqli_connect('localhost', 'root', '', 'xpeed_db');
           
            if (!$this->objConnect) 
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            else 
            {
                return $this->objConnect;
            }
        }
        
        public function executeQuery($conn, $sql)
        {
            $exe = mysqli_query($conn, $sql);

            if ($exe) 
            {
                echo "<br>exe func<br>";
                
            } 
            else 
            {
                echo "<br>";
                printf("error: %s\n", mysqli_error($conn));
                echo "<br>";
            }
            
            return $exe ;
            // return $retVal = ($exe) ? true : false ;
        }

        public function closeConnection($conn)
        {
            $ex = mysqli_close($conn);

            return $ex;
        }
    }