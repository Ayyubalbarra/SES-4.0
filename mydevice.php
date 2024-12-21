<?php
session_start(); // Mulai sesi
if (!isset($_SESSION['user_id'])) {
    // Arahkan pengguna ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

// Masukkan file koneksi database
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Devices</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">
    <?php include('includes/navbarDashboard.php'); ?>

    <div class="container mx-auto px-4 py-8 flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-6">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Guest'); ?>
        </h1>

        <a href="form.php" class="px-6 py-2 bg-black text-white font-semibold rounded-full hover:bg-grey-700 transition duration-200 mb-6">
            + Add Your Device
        </a>

        <div class="w-full max-w-lg bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Connected Devices</h2>

            <?php
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM devices WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo '<ul>';
                while ($device = mysqli_fetch_assoc($result)) {
                    echo '
                    <li class="flex justify-between items-center mb-4 border-b pb-4">
                        <div>
                            <p class="text-lg font-medium">' . htmlspecialchars($device['device_name']) . '</p>
                            <p class="text-sm text-gray-600">ID: ' . htmlspecialchars($device['device_id']) . '</p>
                        </div>
                        <div>
                            <a href="control.php?id=' . $device['device_id'] . '" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Control
                            </a>
                            <a href="delete_device.php?id=' . $device['device_id'] . '" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </a>
                        </div>
                    </li>';
                }
                echo '</ul>';
            } else {
                echo '<p class="text-gray-600 text-center">No devices connected yet.</p>';
            }
            ?>
        </div>
    </div>

    <?php include('includes/tab.php'); ?>
</body>
</html>
