<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

// Fetch running consultations
$running_sql = "SELECT cf.*, k.status 
               FROM konsultasi k
               LEFT JOIN consultation_form cf ON k.id_konsul = cf.id 
               WHERE k.id_user = ? AND (k.status = 'running' OR k.status IS NULL)
               ORDER BY cf.created_at DESC";
$running_stmt = $conn->prepare($running_sql);
$running_stmt->bind_param("i", $_SESSION['user_id']);
$running_stmt->execute();
$running_result = $running_stmt->get_result();
$running_consultations = [];
while($row = $running_result->fetch_assoc()) {
    $running_consultations[] = $row;
}
$running_stmt->close();

// Fetch finished consultations
$finished_sql = "SELECT cf.*, k.status 
                FROM konsultasi k
                LEFT JOIN consultation_form cf ON k.id_konsul = cf.id 
                WHERE k.id_user = ? AND k.status = 'finished'
                ORDER BY cf.created_at DESC";
$finished_stmt = $conn->prepare($finished_sql);
$finished_stmt->bind_param("i", $_SESSION['user_id']);
$finished_stmt->execute();
$finished_result = $finished_stmt->get_result();
$finished_consultations = [];
while($row = $finished_result->fetch_assoc()) {
    $finished_consultations[] = $row;
}
$finished_stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include 'includes/navbarDashboard.php'; ?>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">
                Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </h1>
            <a href="form.php" class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors">
                <i class="fas fa-plus mr-2"></i>
                Book a Consultation
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Running Consultations -->
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <h2 class="text-lg font-semibold mb-4">Running Consultation</h2>
                <?php if (count($running_consultations) > 0): ?>
                    <div class="space-y-4">
                        <?php foreach ($running_consultations as $consultation): ?>
                            <a href="detail.php?id=<?php echo $consultation['id']; ?>" 
                               class="block p-4 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium">
                                            <?php echo htmlspecialchars($consultation['company_name']); ?>
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            <?php echo htmlspecialchars($consultation['company_field']); ?>
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm text-gray-500">
                                            <?php echo date('d M Y', strtotime($consultation['created_at'])); ?>
                                        </span>
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">You don't have any running consultation yet.</p>
                <?php endif; ?>
            </div>

            <!-- Finished Consultations -->
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <h2 class="text-lg font-semibold mb-4">Finished Consultation</h2>
                <?php if (count($finished_consultations) > 0): ?>
                    <div class="space-y-4">
                        <?php foreach ($finished_consultations as $consultation): ?>
                            <a href="detail.php?id=<?php echo $consultation['id']; ?>" 
                               class="block p-4 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium">
                                            <?php echo htmlspecialchars($consultation['company_name']); ?>
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            <?php echo htmlspecialchars($consultation['company_field']); ?>
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm text-gray-500">
                                            <?php echo date('d M Y', strtotime($consultation['created_at'])); ?>
                                        </span>
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">You don't have any finished consultation yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include 'includes/tab.php'; ?>
</body>
</html>