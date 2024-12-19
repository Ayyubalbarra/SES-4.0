<?php
// Menghubungkan file db.php
include('includes/db.php');

// Mengecek apakah parameter id ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Ambil id dari URL

    // Query untuk mengambil data konsultasi berdasarkan id
    $sql = "SELECT * FROM consultation_form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Mengecek apakah data ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc(); // Ambil data ke dalam array
    } else {
        echo "<p>Data not found.</p>";
        exit;
    }
} else {
    echo "<p>No consultation selected.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details</title>
    <link rel="stylesheet" href="assets/css/details.css">
</head>
<body>

<?php include('includes/navbarDashboard.php'); ?>

<h1>Consultation Details</h1>

<div class="details-container">
    <table class="details-table">
        <tr>
            <th>ID</th>
            <td><?php echo $data['id']; ?></td>
        </tr>
        <tr>
            <th>Company Name</th>
            <td><?php echo $data['company_name']; ?></td>
        </tr>
        <tr>
            <th>Company Field</th>
            <td><?php echo $data['company_field']; ?></td>
        </tr>
        <tr>
            <th>Company Size</th>
            <td><?php echo $data['company_size']; ?></td>
        </tr>
        <tr>
            <th>Company Address</th>
            <td><?php echo $data['company_address']; ?></td>
        </tr>
        <tr>
            <th>Current Lighting</th>
            <td><?php echo $data['current_lighting'] ? $data['current_lighting'] : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Problem Detail</th>
            <td><?php echo $data['problem_detail'] ? $data['problem_detail'] : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Goals</th>
            <td><?php echo $data['goals'] ? $data['goals'] : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Min Budget</th>
            <td><?php echo $data['min_budget'] ? 'Rp ' . number_format($data['min_budget'], 0, ',', '.') : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Max Budget</th>
            <td><?php echo $data['max_budget'] ? 'Rp ' . number_format($data['max_budget'], 0, ',', '.') : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Privacy Policy</th>
            <td><?php echo $data['privacy_policy'] ? 'Agreed' : 'Not Agreed'; ?></td>
        </tr>
        <tr>
            <th>Updates & Promotions</th>
            <td><?php echo $data['updates_promotions'] ? 'Agreed' : 'Not Agreed'; ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?php echo $data['created_at']; ?></td>
        </tr>
    </table>
</div>

<p><a href="dashboard.php">Back to Dashboard</a></p>

</body>
</html>

<?php
$conn->close();
?>
