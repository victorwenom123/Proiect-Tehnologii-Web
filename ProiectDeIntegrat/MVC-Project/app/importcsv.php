<?php
// Load the database configuration file
include_once 'includes/dbh.inc.php';

    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id = $line[0];
                $description=$line[1];
                $name   = $line[2];
                $length  = $line[3];
                $tagId  = $line[4];
                $tagName = $line[5];
                $commentId=$line[6];
                $commentName=$line[7];
                $genre=$line[8];
                $date=$line[9];
                $age=$line[10];
                $educationLevel=$line[11];
                $zoneType=$line[12];
                $goodForGroups=$line[13];
                $locationId=$line[14];
                $locationName=$line[15];
                $mood=$line[16];
                $habitatType=$line[17];
                // Check whether member already exists in the database with the same email

                    // Insert member data in the database
                    $conn->query("INSERT INTO songs (id,description,name,length,author,genre,date,age,educationLevel,zoneType,goodForGroups,mood,habitatType) VALUES ('".$id."', '".$description."', '".$name."', '".$length."', '".$author."', '".$genre."', '".$date."', '".$age."', '".$educationLevel."', '".$zoneType."', '".$goodForGroups."', '".$mood.", '".$habitatType."'')");
                    $conn->query("INSERT INTO commentlinking (commentName,idSong,idComment) VALUES ('".$commentName."', '".$id."', '".$commentId."')");
                    $conn->query("INSERT INTO locationlinking (locationName,songId,locationId) VALUES ('".$locationName."', '".$id."', '".$locationId."')");
                    $conn->query("INSERT INTO taglinking (tagName,idSong,idTag) VALUES ('".$tagName."', '".$id."', '".$tagtId."')");
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }

// Redirect to the listing page
 // header("Location: index.php".$qstring);