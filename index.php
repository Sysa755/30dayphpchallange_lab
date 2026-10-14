<?php
require_once __DIR__ . '/utils/functions.php';
require_once __DIR__ . '/utils/db.php'; // Bring in the PDO connection

$error = '';

// Handle POST requests (Create & Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        
        // 1. CREATE: Insert a new task into the database
        if ($_POST['action'] === 'add') {
            $newTask = sanitize($_POST['task_name'] ?? '');
            
            if (!empty($newTask)) {
                // Use Prepared Statements to prevent SQL Injection
                $stmt = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (:task_name)");
                $stmt->execute(['task_name' => $newTask]);
                
                // Redirect back to index.php to prevent form resubmission on page refresh
                header("Location: index.php");
                exit;
            } else {
                $error = 'Task name cannot be empty.';
            }
        }
        
        // 2. DELETE: Wipe all tasks from the database
        if ($_POST['action'] === 'clear') {
            $pdo->query("DELETE FROM tasks");
            
            header("Location: index.php");
            exit;
        }
    }
}

// 3. READ: Fetch all tasks from the database to display
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'components/header.php'; ?>

<!-- Error Display -->
<?php if ($error): ?>
<div style="color: red; margin-bottom: 15px;"><?= $error ?></div>
<?php endif; ?>

<!-- Add Task Form -->
<form method="POST" action="index.php" style="display: flex; gap: 10px; margin-bottom: 20px;">
    <input type="hidden" name="action" value="add">
    <input type="text" name="task_name" placeholder="What needs to be done?" style="flex: 1; padding: 8px;">
    <button type="submit" style="padding: 8px 15px; background: #047857; color: white; border: none; cursor: pointer;">Add</button>
</form>

<!-- Task List Loop -->
<ul class="task-list">
    <?php if (empty($tasks)): ?>
        <li class="task-item" style="color: #94a3b8;">No tasks yet. You are all caught up!</li>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <li class="task-item">
                <?= htmlspecialchars($task['task_name']) ?>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<!-- Clear All Form -->
<?php if (!empty($tasks)): ?>
<form method="POST" action="index.php" style="margin-top: 20px;">
    <input type="hidden" name="action" value="clear">
    <button type="submit" style="padding: 5px 10px; background: #ef4444; color: white; border: none; font-size: 12px;">Clear All Tasks</button>
</form>
<?php endif; ?>

<?php include 'components/footer.php'; ?>