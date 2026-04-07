<?php include 'header.php'; ?>

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
        <?php
        if(isset($_GET['gridSize'])) { 
            $gridSize = $_GET['gridSize'];
            if($gridSize < 1 || $gridSize > 26) {
                echo "Not able to create a table with these values. Please input values between 1 and 26.";
            }
        }
        if(isset($_GET['numColors'])) {
            $numColors = $_GET['numColors'];
            if($numColors < 1 || $numColors > 10) {
                echo "Not able to create a table with these values. Please specify a number of colors between 1 and 10.";
            }
        }
    ?>
</body>
<?php include 'footer.php'; ?>

