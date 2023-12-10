<?php
include("dbsetup.php");

// Get the query from the AJAX request (sanitize or use prepared statements to prevent SQL injection)
$query = "SELECT * FROM contacts WHERE type = 'Support' ";

// Run the query using prepared statements
$stmt = $conn->prepare($query);
$stmt->execute();

// Fetch all rows as an associative array
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($data);


// Check if the query was successful
if ($data) {

    // Create the HTML table
    echo '<table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Contact Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

    // Populate the table with the returned data
    foreach ($data as $row) {
        echo '<tr>
                <td><strong>' . $row['title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . '</strong></td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['company'] . '</td>
                <td class="contacttype">' . ($row['type'] === "Support" ? '<div id="support">' . $row['type'] . '</div>' : '<div id="saleslead">' . $row['type'] . '</div>') . '</td>
                <td><button type="button" onclick="loadContactDetails(\'contactDetails\', ' . $row['id'] . ')" >View</button></td>
            </tr>';
    }

    // Close the HTML table
    echo '</tbody></table>';
} else {
    // Handle the case where the query failed
    echo json_encode(['error' => $stmt->errorInfo()]);
}

// Close the database connection (optional, depending on your setup)
$conn = null;
?>
