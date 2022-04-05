<?php
    class dbcon
    {
        public $instance;

        function connect()
        {
            try
            {
                $this->instance = new PDO('mysql:host=localhost;dbname=repairshop;charset=utf8mb4', 'root', '', [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);

                if (!$this->instance)
                    return false;
            } catch (\PDOException $th)
            {
                return false;
            }

            return true;
        }

        // Wrapper error for connect method
        function werr_connect($redir, $msg = 'Failed to connect to database.')
        {
            if ($this->connect())
                return true;

            echo '<script>
                    alert("' . $msg . '");
                    window.location.replace("' . $redir . '");
                 </script>';
                 
            return false;
        }

        function query($q, ...$params)
        {
            $prep = $this->instance->prepare($q);
            $prep->execute($params);
            return $prep;
        }

        function close()
        {
            $this->instance = null;
            return true;
        }
    }
?>