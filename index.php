<?php
// Include required files
require_once 'db.php';
require_once 'controllers/TreeController.php';

// Get database connection and create TreeController instance
$db = DB::getInstance();
$conn = $db->getConnection();
$treeController = new TreeController($conn);

// Fetch all tree nodes
$treeNodes = $treeController->getAllTreeNodes();

// Function to convert the array of TreeNode objects into a named array indexed by parent_id
function convertArray($treeNodes) {
    $namedArray = array();
    foreach ($treeNodes as $node) {
        $parentId = $node->parent_id;
        if (!isset($namedArray[$parentId])) {
            $namedArray[$parentId] = array();
        }
        array_push($namedArray[$parentId], $node);
    }
    return $namedArray;
}

$convertedArray = convertArray($treeNodes);

// Recursive function to build the tree HTML structure
// It takes the parent_id, tree structure, current depth, and the accumulated HTML as arguments
function buildTreeHtml($parentId, $tree, $depth, &$html) {
    // If there are no child nodes for the current parent_id, return
    if (!isset($tree[$parentId])) {
        return;
    }

    // If the current depth is not in the $html array, initialize it with an empty array
    if (!isset($html[$depth])) {
        $html[$depth] = array();
    }

    $groupHtml = '';    // Variable to store the group HTML structure
    $isNewGroup = true; // Flag to determine if a new group should be created

    // Iterate through the child nodes of the current parent_id
    foreach ($tree[$parentId] as $node) {
        // If a new group should be created, add an opening group div tag
        if ($isNewGroup) {
            $groupHtml .= "<div class='group'>";
            $isNewGroup = false;
        }

        // Add the current node HTML structure to the groupHtml
        $groupHtml .= "<div class='node' data-id='{$node->id}' data-parent-id='{$node->parent_id}' data-depth='{$depth}'>[P: {$node->parent_id} ID: {$node->id}]</div>";

        // Recursively call the buildTreeHtml function for the child nodes of the current node
        buildTreeHtml($node->id, $tree, $depth + 1, $html);
    }

    // If there is any groupHtml, add a closing group div tag and push it to the $html array at the current depth
    if (!empty($groupHtml)) {
        $groupHtml .= "</div>";
        array_push($html[$depth], $groupHtml);
    }
}

$treeHtmlArray = array();
buildTreeHtml("0", $convertedArray, 0, $treeHtmlArray);

// Build the final tree HTML structure from the $treeHtmlArray
$treeHtml = '';
foreach ($treeHtmlArray as $levelHtml) {
    $treeHtml .= "<div class='level'>"; // Add an opening level div tag
    foreach ($levelHtml as $groupHtml) {
        $treeHtml .= $groupHtml; // Add the group HTML structure to the current level
    }
    $treeHtml .= "</div>"; // Add a closing level div tag
}
$treeNodes = $convertedArray;
// Include the view
include 'views/index.view.php';
