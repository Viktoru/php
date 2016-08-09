<?php
 if (($handle = fopen("/data.csv", "r")) !== FALSE)
    {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[0] == 1) {
            //    $vuColorDNS = "B"; // Red
                for ($c = 1; $c < $num; $c++) {
                    //    echo "$data[$c]";
                }
            }
            continue;
        }
        fclose($handle);
    }
?>

//Format data.csv file
