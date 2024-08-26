<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes.PHP</title>
</head>
<body>
    <h1>User Attributes</h1>
    <p>Username : <?php echo htmlspecialchars($attributs['username']); ?></p>
    <p>Email : <?php echo htmlspecialchars($attributs['email']); ?></p>
    <p>First name : <?php echo htmlspecialchars($attributs['firstname']); ?></p>
    <p>Last Name : <?php echo htmlspecialchars($attributs['lastname'])?></p>
</body>
</html>