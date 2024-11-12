<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
    <style>
        fieldset {
            width: 500px;
            margin-bottom: 15px;
        }
        legend {
            font-weight: bold;
            padding: 0 5px;
        }
        label, input[type="checkbox"], select, input[type="number"], button {
            display: block;
            margin: 5px 0;
        }
        h1 {
            font-size: 1.5em;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>

    <?php 
        $drinks = [
            'Coke' => 15,
            'Sprite' => 20,
            'Royal' => 20,
            'Pepsi' => 15,
            'Mountain Dew' => 20
        ];
        $sizes = [
            'Regular' => 0,
            'Up-Size' => 5,
            'Jumbo' => 10
        ];
    ?>

    <form method="post">
        <h1>Vendo Machine</h1>

        <fieldset>
            <legend>Products:</legend>
            <?php foreach($drinks as $name => $price): ?>
                <input type="checkbox" name="chkDrinks[]" id="chkDrink<?php echo $name; ?>" value="<?php echo $name; ?>">
                <label for="chkDrink<?php echo $name; ?>">
                    <?php echo "$name - ₱$price"; ?>
                </label>
            <?php endforeach; ?>
        </fieldset>

        <fieldset>
            <legend>Options:</legend>
            <label for="drpSizes">Size</label>
            <select name="drpSizes" id="drpSizes">
                <?php foreach ($sizes as $size => $additionalCost): ?>
                    <option value="<?php echo $size; ?>">
                        <?php echo $size . ($additionalCost > 0 ? " (add ₱$additionalCost)" : ""); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="noQuantity">Quantity</label>
            <input type="number" name="noQuantity" id="noQuantity" min="1" value="1">
            <button type="submit" name="btnCheck">Check out</button>
        </fieldset>
    </form>

    <?php
        if (isset($_POST['btnCheck'])) {
            if (empty($_POST['chkDrinks'])) {
                echo "<h1>No Selected Item, Try Again.</h1>";
            } else {
                $drinksChosen = $_POST['chkDrinks'];
                $size = $_POST['drpSizes'];
                $quantity = $_POST['noQuantity'];
                $total = 0;
                $totalItems = 0;
                echo "<hr><h1>Purchase Summary:</h1><ul>";
                
                foreach ($drinksChosen as $drink) {
                    $cost = ($drinks[$drink] + $sizes[$size]) * $quantity;
                    $total += $cost;
                    $totalItems += $quantity;
                    echo "<li>$quantity " . ($quantity > 1 ? 'pieces' : 'piece') . " of $size $drink amounting to ₱$cost</li>";
                }
                
                echo "</ul>";
                echo "<b>Total Number of Items: $totalItems</b><br>";
                echo "<b>Total Amount: ₱$total</b>";
            }
        }
    ?>

</body>
</html>
 