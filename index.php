<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CI/CD Docker Deployment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>🚀 PHP App Deployed with CI/CD</h1>
    <p>This application is deployed using:</p>

    <ul>
        <li>Jenkins CI/CD Pipeline</li>
        <li>Docker + Docker Hub</li>
        <li>EC2 Auto Deployment</li>
        <li>GitHub Webhooks</li>
    </ul>

    <p class="version">Build Version: 
        <span>
            <?php echo rand(1000, 9999); ?>
        </span>
    </p>
</div>

<footer>
    <p>Created by Abhishek Giri | DevOps Engineer</p>
</footer>

</body>
</html>
