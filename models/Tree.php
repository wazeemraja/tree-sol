<?php
require_once __DIR__.'/../models/BaseModel.php';
require_once __DIR__.'/../models/TreeNode.php';

class Tree extends BaseModel {
    // Get all tree nodes
    public function getTreeNodes() {
        $query = "SELECT * FROM tree_nodes";
        $result = $this->conn->query($query);
        $treeNodes = [];

        // Loop through the result and create TreeNode instances
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($treeNodes, new TreeNode($row["id"], $row["parent_id"]));
            }
        }

        return $treeNodes;
    }

    // Add a new node to the tree
    public function addNode($parent_id) {
        $query = "INSERT INTO tree_nodes (parent_id) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $parent_id);
        $stmt->execute();

        return $stmt->insert_id;
    }

    // Get a tree node by its ID
    public function getTreeNodeById($id) {
        $query = "SELECT * FROM tree_nodes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new TreeNode($row["id"], $row["parent_id"]);
        }

        return null;
    }
}
