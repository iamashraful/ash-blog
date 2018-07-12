<?php
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
?>