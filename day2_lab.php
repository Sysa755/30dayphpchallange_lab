<?php
declare(strict_types=1);

function determineGrade(int $score): string
{
    if ($score >= 90) {
        return 'A';
    } elseif ($score >= 80) {
        return 'B';
    } elseif ($score >= 70) {
        return 'C';
    } elseif ($score >= 60) {
        return 'D';
    } else {
        return 'F';
    }
}

function checkHonour(string $grade): bool
{
    return $grade === 'A' || $grade === 'B';
}

$studentScore = 88;
$studentGrade = determineGrade($studentScore);
$isHonourRoll = checkHonour($studentGrade);
$message = $isHonourRoll ? 'Congratulations! You are on the honour roll.' : 'Keep trying!';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><strong>HELLO, THIS IS DAY 2</strong></h1>
    <h2>Student Results</h2>
    <p>Score: <?php echo $studentScore; ?></p>
    <p>Grade: <?php echo $studentGrade; ?></p>
    <p><?php echo $message; ?></p>
</body>
</html>
