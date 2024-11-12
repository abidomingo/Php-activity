<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>
    
    <form method="post">
        <label for="rangeSize">Select Photo Size:</label>
        <input type="range" name="rangeSize" id="rangeSize" min="10" max="100" value="60"><br> 
        
        <label for="slctColorBorder">Select Border Color:</label>
        <input type="color" name="slctColorBorder" id="slctColorBorder" value="#000000"><br><br> 

        <button type="submit" name="btnProcess">Process</button><br><br>
    </form>

    <?php 
    if (isset($_POST['btnProcess'])) { 
        $borderColor = $_POST['slctColorBorder'] ?? '#000000';
        $imgSize = $_POST['rangeSize'] ?? 10;
    ?>
        <!-- Display the image with the selected border color and size -->
        <img src="abi.jpg" alt="Selected Image" 
             width="<?php echo $imgSize; ?>%" 
             height="<?php echo $imgSize; ?>%" 
             style="border: 5px solid <?php echo $borderColor; ?>;">
    <?php } ?>
</body>
</html>
