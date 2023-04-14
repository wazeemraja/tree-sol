<?php
// require_once 'db.php';
// require_once 'models/TreeNode.php';

// header('Content-Type: application/json');

// $db = DB::getInstance();
// $conn = $db->getConnection();

// $pid = isset($_POST['pid']) ? intval($_POST['pid']) : null;

// if ($pid !== null) {
//     $stmt = $conn->prepare("INSERT INTO tree_nodes (parent_id) VALUES (?)");
//     $stmt->bind_param("i", $pid);
//     $stmt->execute();
//     $new_id = $stmt->insert_id;
//     $stmt->close();

//     echo json_encode(['id' => $new_id]);
// } else {
//     echo json_encode(['error' => 'Invalid parent node ID.']);
// }
require_once 'db.php';
require_once 'controllers/TreeController.php';
header('Content-Type: application/json');

$db = DB::getInstance();
$conn = $db->getConnection();
$treeController = new TreeController($conn);



try {
        $parent_id = isset($_POST['pid']) ? intval($_POST['pid']) : null;

        if ($parent_id !== null) {
            $node_exists = $treeController->getTreeNodeById($parent_id);
            if ($node_exists) {
                $new_node_id = $treeController->addNode($parent_id);
                echo json_encode(['id' => $new_node_id]);
            } else {
                echo json_encode(['error' => 'Invalid parent node ID.']);
            }
        } else {
            echo json_encode(['error' => 'Parent node ID is required.']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => 'An error occurred while adding the node.']);
    }