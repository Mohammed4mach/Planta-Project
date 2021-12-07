<?php

// Encapsulate database connection functions in one
    function executeSQL($conn, $sql, $type = null, ...$param) {
        $stmt = mysqli_stmt_init($conn);
        
        if(mysqli_stmt_prepare($stmt, $sql)) {
            if(!is_null($type)) mysqli_stmt_bind_param($stmt, $type, ...$param);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rownum = mysqli_num_rows($result);
            if($rownum >= 0) {
                $rows = array();
                while($row = mysqli_fetch_assoc($result))
                {
                    array_push($rows, $row);
                }

                mysqli_stmt_close($stmt);
                return $rows;
            }
        }
    }


// Encapsulate input sanitize functions in one
    function sanInput($input) {
        $sanitized = stripslashes($input);
        $sanitized = htmlspecialchars($sanitized);
        $sanitized = trim($sanitized);

        return $sanitized;
    }