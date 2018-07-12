<?php
    include dirname(__DIR__).'/utility/cors.php';
    include dirname(__DIR__).'/../config/db_config.php';
    include dirname(__DIR__).'/orm/builders.php';

    function create($table, $data, $connection) {
        $query = query_builder($table, "INSERT", $data);
        $result = $connection->query($query);
        $response = ['success' => false, 'message' => 'Request does not process successfully.'];
        if($result == TRUE) {
            // TODO: Will response the full object
            $response = ['success' => true, 'message' => 'Request process successfully.'];
        }
    	return json_encode($response);
        // echo $query;
    }

    // TEST CODE
    // create('user', ['username'=> 'a444in0', 'password'=> 'admin', 'name'=> 'John Doe'], $conn)
?>