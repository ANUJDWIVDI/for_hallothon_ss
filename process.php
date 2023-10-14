<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the USN and selected semester from the form
    $usn = $_POST["usn"];
    $semester = $_POST["semester"];

    // Get the selected courses
    if (isset($_POST["courses"])) {
        $selectedCourses = $_POST["courses"];
        // Convert the selected courses array to a string
        $coursesString = implode(", ", $selectedCourses);

        // Create or open a CSV file for writing
        $csvFileName = "course_selection.csv";
        $file = fopen($csvFileName, "a"); // Use "w" instead of "a" if you want to overwrite the file

        if ($file) {
            // Write the data to the CSV file
            fputcsv($file, array($usn, $semester, $coursesString));

            // Close the CSV file
            fclose($file);

            echo "Data stored in $csvFileName successfully!";
        } else {
            echo "Error opening the CSV file.";
        }
    }
}
?>
