<?php
session_start();
require_once __DIR__ . '/utils/functions.php';

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $newTask = sanitize($_POST['task_name'] ?? '');

        if (!empty($newTask)) {
            $_SESSION['tasks'][] = $newTask;
        } else {
            $error = 'Task name cannot be empty.';
        }
    }

    if (isset($_POST['action']) && $_POST['action'] === 'clear') {
        $_SESSION['tasks'] = [];
    }
}
?>
<?php
include __DIR__ . '/components/header.php';
?>
<!--Error Display!>
<!-- Error Display -->
<?php if ($error): ?>
<div style="color: red; margin-bottom: 15px;"><?= $error ?></div>
<?php endif; ?>
<!-- Add Task Form -->
<form method="POST" action="" style="display: flex; gap: 10px; margin-bottom: 20px;">
<input type="hidden" name="action" value="add">
<input type="text" name="task_name" placeholder="What needs to be done?" style="fl
ex: 1; padding: 8px;">
<button type="submit" style="padding: 8px 15px; background: #047857; color: white;
border: none; cursor: pointer;">Add</button>
</form>
<!-- Task List Loop -->
<ul class="task-list">
<?php if (empty($_SESSION['tasks'])): ?>
<li class="task-item" style="color: #94a3b8;">No tasks yet. You are all caught
up!</li>
<?php else: ?>
<?php foreach ($_SESSION['tasks'] as $task): ?>
<li class="task-item">
<?= $task ?></li>
<?php endforeach; ?>
<?php endif; ?>
</ul>
✅
<!-- Clear All Form -->
<?php if (!empty($_SESSION['tasks'])): ?>
<form method="POST" action="" style="margin-top: 20px;">
<input type="hidden" name="action" value="clear">
<button type="submit" style="padding: 5px 10px; background: #ef4444; color: wh
ite; border: none; font-size: 12px;">Clear All Tasks</button>
</form>
<?php endif; ?>
<?php
include __DIR__ . '/components/footer.php';
?>