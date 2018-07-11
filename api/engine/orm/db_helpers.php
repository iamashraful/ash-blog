<?php
    include 'engine/utility/constants.php';

    function insert_query_mapper($data) {
        $query_part = "";
        $fields = "(";
        $values = "(";
        $numItems = count($data);
        $i = 0;
        foreach($data as $key => $value){
            $fields .= "`".$key."`";
            $values .= '"'.$value.'"';
            if(++$i !== $numItems) {
                $fields .= ', ';
                $values .= ', ';
            }
        }
        $fields .= ")";
        $values .= ")";
        $query_part .= $fields . " VALUES" . $values;
        // echo $query_part;
        return $query_part;
    }

    function query_builder($table, $query_type, $data) {
        if ($query_type == "INSERT") {
            $q_part = insert_query_mapper($data);
            $query = "INSERT INTO `" . $table . "`" . $q_part;
            return $query;
        }
    }

    function create($table, $data, $connection) {
        $query = query_builder($table, "INSERT", $data);
        $result = $connection->query($query);
        $response = [];
        if($result && $result->num_rows == 1) {
            $row = $result->fetch_row();
            // TODO: Will response the full object
            $response = ['success' => true, 'message' => 'Request process successfully.'];
        }
    	echo json_encode($response);
        // echo $query;
    }
    include '/srv/http/ash-blog/api/config/db_config.php';
    create('user', ['username'=> 'adin1', 'password'=> 'admin', 'name'=> 'John'], $conn)
?>