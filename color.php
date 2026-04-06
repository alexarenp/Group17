<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color</title>
    <link rel="stylesheet" href="style.css">

</head>
<header>
    <h1>Color Coordinator</h1>
</header>
<body>
    <form action="color.php" method="GET">
        Rows and Columns: <input type="number" name="gridSize" required>
        <br>
        Colors: <input type="number" name="numColors" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

