<!DOCTYPE html>
<!-- 
    Rules Twist: Registered Email for Verification
    Email: kshanvi462@gmail.com 
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shanvi API Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Week 04 Project: Shanvi API Dashboard</h1>

    <div class="card">
        <h2>Greeting:</h2>
        <?php
            try {
                $greet_json = @file_get_contents("http://localhost/shanvi-api/api/greet.php?name=Shanvi");
                if ($greet_json === false) { throw new Exception(); }
                $greet_data = json_decode($greet_json, true);
                echo "<p><strong>" . htmlspecialchars($greet_data['message'], ENT_QUOTES, 'UTF-8') . "</strong></p>";
            } catch (Exception $e) {
                echo "<p class='error-msg'>Something went wrong loading the greeting message.</p>";
            }
        ?>
    </div>

    <div class="card">
        <h2>Study Tips:</h2>
        <ul>
            <?php
                try {
                    $list_json = @file_get_contents("http://localhost/shanvi-api/api/list.php");
                    if ($list_json === false) { throw new Exception(); }
                    $tips_data = json_decode($list_json, true);
                    foreach($tips_data as $tip) {
                        echo "<li>" . htmlspecialchars($tip, ENT_QUOTES, 'UTF-8') . "</li>";
                    }
                } catch (Exception $e) {
                    echo "<p class='error-msg'>We couldn't load the study tips.</p>";
                }
            ?>
        </ul>
    </div>
</body>
</html>