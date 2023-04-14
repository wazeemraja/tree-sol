<?php
require_once __DIR__.'/../models/Tree.php';

class TreeController {
    private $treeModel;

    public function __construct($conn) {
        $this->treeModel = new Tree($conn);
    }

    // Get all tree nodes
    public function getAllTreeNodes() {
        return $this->treeModel->getTreeNodes();
    }

    // Add a new node to the tree
    public function addNode($parent_id) {
        return $this->treeModel->addNode($parent_id);
    }

    // Get a tree node by its ID
    public function getTreeNodeById($id) {
        return $this->treeModel->getTreeNodeById($id);
    }
}
