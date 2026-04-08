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
    <form name="makeprint" action="color.php" method=POST>
        <button type="submit" name="printButton">Print</button>
    </form>
    <div id="duplicate-msg">That color is already in use. Your selection has been reverted.</div>
        <?php
        $validGridSize = false;
        $validNumColors = false;
        if(isset($_GET['gridSize'])) { 
            $gridSize = $_GET['gridSize'];
            if($gridSize < 1 || $gridSize > 26) {
                echo "Not able to create a table with these values. Please input values between 1 and 26. <br>";
                $validGridSize = false;
            }
            else {
                $validGridSize = true;
            }
        }
        if(isset($_GET['numColors'])) {
            $numColors = $_GET['numColors'];
            if($numColors < 1 || $numColors > 10) {
                echo "Not able to create a table with these values. Please specify a number of colors between 1 and 10. <br>";
                $validNumColors = false;
            }
            else {
                $validNumColors = true;
            }
        }
        $colors = ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey", "Brown", "Black", "Teal"];
        if($validGridSize && $validNumColors) {
            echo "<table class='color-table'>";
            for($i = 0; $i < $numColors; $i++) {
                $defaultColor = $colors[$i];
                echo "<tr>";
                echo "<td>";
                echo "<select name='color$i' id='color$i' data-index='$i' onchange='updateColor(this)'>"; 
                foreach($colors as $index => $color) {
                    $selected = ($index == $i) ? "selected" : "";
                    echo "<option value='$color' $selected>$color</option>";
                }
                echo '</select>';
                echo "</td>";
                echo "<td>";
                echo "<span class='color-preview' id='preview$i'></span>";
                echo "</td>";
                echo "</tr>";
        }
            echo "</table>";
        }
        if(isset($_POST["printButton"])) {
            header("Location: print.php");
            exit();
        }
    ?>

    <script>
        const colorMap = {
            "Red":    "#e74c3c",
            "Orange": "#e67e22",
            "Yellow": "#f1c40f",
            "Green":  "#27ae60",
            "Blue":   "#2980b9",
            "Purple": "#8e44ad",
            "Grey":   "#95a5a6",
            "Brown":  "#7f5539",
            "Black":  "#2c2c2c",
            "Teal":   "#008080"
        };
 
        const previousValues = {};
        document.querySelectorAll('select[id^="color"]').forEach(function(sel) {
            const idx = sel.dataset.index;
            previousValues[idx] = sel.value;
            // Set initial preview color from JS colorMap
            const preview = document.getElementById('preview' + idx);
            if (preview) {
                preview.style.backgroundColor = colorMap[sel.value] || '#fff';
            }
        });
 
        function updateColor(selectEl) {
            const idx = selectEl.dataset.index;
            const newColor = selectEl.value;
            const msgEl = document.getElementById('duplicate-msg');
 
            let duplicate = false;
            document.querySelectorAll('select[id^="color"]').forEach(function(other) {
                if (other !== selectEl && other.value === newColor) {
                    duplicate = true;
                }
            });
 
            if (duplicate) {
                selectEl.value = previousValues[idx];
                msgEl.style.display = 'block';
                setTimeout(function() { msgEl.style.display = 'none'; }, 3500);
            } else {
                previousValues[idx] = newColor;
                const preview = document.getElementById('preview' + idx);
                if (preview) {
                    preview.style.backgroundColor = colorMap[newColor] || '#fff';
                }
                msgEl.style.display = 'none';
            }
        }
    </script>
</body>
</html>

