<?php

namespace MusicEngine\Midleware;

class Core extends Database
{
    /**
     * @return \mysqli
     * Uses Database Class Params
     */

    public function connnect()
    {
        return $this->connect();
    }


    /**
     * Cleans Up Strings
     * Makes Sure the data is sanitized
     * and no forbidden chars are used
     */

    public function clean($string)
    {

        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-\|]/', '', $string); // Removes special chars.
    }

    /**
     * Redirect to a specific URI
     */
    public function redirect($url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
        } else {
            $content = '<script type="text/javascript">';
            $content .= 'window.location.href="' . $url . '";';
            $content .= '</script>';
            $content .= '<noscript>';
            $content .= '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            $content .= '</noscript>';
            echo $content;
        }
    }


    /**
     * @param string $string
     * @return string|string[]|null
     */
    public function readableVals(string $string)
    {
        return preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($string));
    }

    /**
     * Build HTML table from array
     */

    /**
     * @param array $array
     * @param string $style
     * @return string
     */

    public function build_html_table(array $array, $style = "horizontal")
    {
        if (is_array($array) && count($array) > 0) {
            if ($style == "inline") {

                $table = '<table class="data-view" id="data-table" style="font-size:13px;">';
                // header row
                $table .= '<thead class="bg-primary text-white">';
                $table .= '<tr>';
                foreach($array[0] as $key=>$value){
                    $table .= '<th>' . htmlspecialchars($this->readableVals($key)) . '</th>';
                }
                $table .= '</tr>';
                $table .= '</thead>';

                // data rows
                foreach( $array as $key=>$value){
                    $table .= '<tr>';
                    foreach($value as $key2=>$value2){
                        $table .= '<td>' . htmlspecialchars($value2) . '</td>';
                    }
                    $table .= '</tr>';
                }

                // finish table and return it

                $table .= '</table>';

            } else {
                $table = '<table class="table table-bordered table-hover" style="font-size:13px;">';
                $table .= "<tbody>";
                foreach ($array as $array_key => $array_value) {
                    if (!is_array($array_value)) {
                        $table .= "<tr><td><b>".$this->readableVals($array_key)."</b></td><td>$array_value</td></tr>";
                    } else {
                        $table .= "<tr><td>";
                        $table .= $this->build_html_table($array_value);
                        $table .= "</td></tr>";
                    }


                }
                $table .= "</tbody>";
                $table .= "</table>";
            }


            return $table;
        } else {
            return "No data found!";
        }
    }


    /**
     * $_FILES Params
     */

    public function get_files_request(string $key)
    {
        if(isset($_FILES[$key]))
        {
            return $_FILES[$key];
        }
        else
        {
            return null;
        }
    }


    /**
     * $GET_PARAMS access
     */

    public function is_request(string $type = NULL)
    {
        if ($type == "GET") {
            return $_GET;
        } else {
            return $_POST;
        }

    }

    public function hasRequest(string $type = NULL , string $key)
    {
        if($type == "GET")
        {
            if(isset($_GET[$key]) && !empty($_GET[$key]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if(isset($_POST[$key]) && !empty($_POST[$key]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }

    public function getRequest(string $type = NULL, string $key)
    {
        if($type == "GET")
        {
            return $_GET[$key];
        }
        else
        {
            return $_POST[$key];
        }
    }


    /**
     * Run any query given
     */

    public function execute_query(string $query)
    {
        $con = $this->connect();

        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            return $run_query;
        } else {
            return mysqli_error($con);
        }
    }



    /**
     * Removes all files from a directory
     */
    private function remove_files($path)
    {
        $files = glob($path.'/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }
    }



    /**
     * @param string $table
     * @param array $columns
     * @param array $values
     * @return array
     */

    public function insert_data(string $table, array $columns, array $values)
    {

        $con = $this->connect();
        $column_count = count($columns);
        $overwriteArr = array_fill(0, $column_count, '?');

        for ($i = 0; $i < sizeof($columns); $i++) {
            $columns[$i] = trim($columns[$i]);
            $columns[$i] = '`' . $columns[$i] . '`';
        }

        $query = "INSERT INTO {$table} (" . implode(',', $columns) . ") VALUES (" .
            implode(',', $overwriteArr) . ")";

        foreach ($values as $value) {
            $value = trim($value);
            $value = mysqli_real_escape_string($con, $value);
            $value = '"' . $value . '"';
            $query = preg_replace('/\?/', $value, $query, 1);
        }
        $result = mysqli_query($con, $query);

        if ($result == true) {
            return array(
                "result" => "true",
                "query_id" => mysqli_insert_id($con)
            );
        } else {
            return array(
                "result" => "false",
                "error" => mysqli_error($con),
                "sql" => $query);
        }
    }

    /**
     * Update Mysql Data
     * @array of cols
     * @array of values
     * @array containing criteria
     * ex: criteria : array("id" => "11", "name" => "alexander")
     */
    public function update_data(string $table, array $criteria, array $cols, array $vals)
    {
        $con = $this->connect();

        if (count($cols) == count($vals)) {
            $begin_query = "UPDATE " . $table . " SET ";

            foreach ($cols as $col_key => $col_value) {
                $value = $vals[$col_key];
                $value = mysqli_real_escape_string($con, $value);
                $values[] = " `" . $col_value . "` = '" . $value . "' ";
            }

            $begin_query .= implode(",", $values) . " WHERE ";

            foreach ($criteria as $criteria_key => $criteria_value) {
                $criteria_value = mysqli_real_escape_string($con, $criteria_value);
                $criterias[] = "" . $criteria_key . " = '" . addslashes($criteria_value) . "' ";
            }

            $begin_query .= implode(" AND ", $criterias);

            $execute = mysqli_query($con, $begin_query);

            if ($execute) {
                return array("result" => "true");
            } else {
                return array("result" => "false", "error" => mysqli_error($con) . " - " . $begin_query . "");
            }


        } else {
            return array("result" => "false", "error" => "Mismatch between column and value count! : " . count($cols) . " columns and " . count($vals) . "");
        }
    }


    /**
     * @param $csv
     * @param string $delimiter
     * @param bool $header_line
     * @return array|array[]|false
     */

    public function csv_to_array($csv, $delimiter = ';', $header_line = true)
    {
        
        $csv = str_replace("\r\n", "\n", $csv); // we don't pass the \r line ending from DOS

        // Read the CSV lines into a numerically indexed array.
        $all_lines = str_getcsv($csv, "\n");
        if (!$all_lines) {
            return false;
        }

            $csv = array_map(function (&$line) use ($delimiter){
                return str_getcsv($line, $delimiter);
            }, $all_lines);

            if ($header_line) {
                // Use the first row's values as keys for all other rows
                array_walk($csv, function (&$a) use ($csv){
                    $a = array_combine($csv[0], $a);
                });
                // remove the column header row
                array_shift($csv);
            }

            return $csv;
    }




}

?>