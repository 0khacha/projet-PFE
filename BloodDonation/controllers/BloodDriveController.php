<?php

class BloodDriveController
{
    // Static method to get blood drives from the database
    public static function getBloodDrives()
    {
        include 'db_connection.php';

        // Query to retrieve data from the blood_drives table
        $sql = "SELECT * FROM blood_drives";
        $result = $pdo->query($sql);

        $bloodDrives = array();

        // Check if there are any rows in the result
        if ($result->rowCount() > 0) {
            // Fetch data and store in an array
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $bloodDrives[] = $row;
            }
        }

        // Close the database connection
        $pdo = null;

        return $bloodDrives;
    }
    public static function getBloodDrivesByLocation($location)
    {
        include 'db_connection.php';

        // Query to retrieve data from the blood_drives table based on location
        $sql = "SELECT * FROM blood_drives WHERE location LIKE :location OR zip = :location";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->execute();

        $bloodDrives = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $pdo = null;

        return $bloodDrives;
    }
}
?>
