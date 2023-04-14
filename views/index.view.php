<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Manager</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Fallback styles in case the styles.css file is not loaded */
        .node {
            display: inline-block;
        }
        .group {
            display: inline-block;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <h1>Tree Manager</h1>
    <div class="tree" id="tree-container">
        <?php
            echo $treeHtml;
        ?>
    </div>
    <div id="node-creation">
        <label for="pid">Parent Node ID:</label>
        <input type="number" id="pid" name="pid">
        <button id="add-node">Add</button>
        <div id="error-message"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>