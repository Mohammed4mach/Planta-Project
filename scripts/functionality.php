<?php

    date_default_timezone_set('Africa/Cairo'); // Set Timezone to Cairo

// Encapsulate database connection functions in one
    function executeSQL($conn, $sql, $type = null, ...$param) {
        $stmt = mysqli_stmt_init($conn);
        
        if(mysqli_stmt_prepare($stmt, $sql)) {
            if(!is_null($type))
                mysqli_stmt_bind_param($stmt, $type, ...$param);
            if(!mysqli_stmt_execute($stmt))
                echo 'SQL syntax error!';
            else
            {
                $result = mysqli_stmt_get_result($stmt);
                if(!$result)
                    return;
                else
                {
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
        }
    }


// Encapsulate input sanitize functions in one
    function sanInput($input) {
        $sanitized = stripslashes($input);
        $sanitized = htmlspecialchars($sanitized);
        $sanitized = trim($sanitized);

        return $sanitized;
    }


// Unique id function generator
    function genId($length) {
        $min = (int)(0.1 * (10**$length));
        $max = (int)(0.99999999999 * (10**$length));
        $random = rand($min, $max);
        return $random;
    }

// Function to calculate age
    function calcAge($birth_date) {
        $age = 0;
        $arr1 = explode('-', $birth_date, 9);
        $birth_year = $arr1[0];
        $currentYear = date('Y', time());
        
        $age = $currentYear - $birth_year;
        return $age;
    }
