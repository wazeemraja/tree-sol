<?php
class TreeNode {
    public $id;
    public $parent_id;

    public function __construct($id, $parent_id) {
        $this->id = $id;
        $this->parent_id = $parent_id;
    }
}