const TreeManager = {
    treeContainer: null,
    pidInput: null,
    addButton: null,
    errorMessage: null,

    init: function () {
        this.treeContainer = $("#tree-container");
        this.pidInput = $("#pid");
        this.addButton = $("#add-node");
        this.errorMessage = $("#error-message");

        this.attachEventHandlers();
    },

    attachEventHandlers: function () {
        this.addButton.on("click", () => {
            const pid = parseInt(this.pidInput.val());

            if (isNaN(pid) || pid < 1) {
                    this.showError("Invalid parent node ID");
                    return;
                }
    
                this.addNode(pid);
            });
        },
    
        addNode: function (parentId) {
            $.ajax({
                url: "add_node.php",
                method: "POST",
                data: { pid: parentId },
                dataType: "json",
                success: (response) => {
                    if (response.id) {
                        this.appendTreeNode(response.node_id, parentId);
                        this.clearError();
                    } else {
                        this.showError(response.message);
                    }
                },
                error: () => {
                    this.showError("An error occurred while adding the node.");
                }
            });
        },
    
        appendTreeNode: function (id, parentId) {
            const parentNode = this.treeContainer.find(`[data-id='${parentId}']`);
            const newNode = $("<div>", {
                class: "node",
                "data-id": id,
                "data-parent-id": parentId,
                text: `[P: ${parentId} ID: ${id}]`
            });
    
            if (parentNode.length) {
                const parentLevel = parentNode.closest(".level");
                const nextLevel = parentLevel.next(".level");
    
                if (nextLevel.length) {
                    nextLevel.append(newNode);
                } else {
                    // create a new level if a parent with the same depth does not exist    
                    const newLevel = $("<div>", { class: "level" }).append(newNode);
                    parentLevel.after(newLevel);
                    
                }
            } else {
                const newLevel = $("<div>", { class: "level" }).append(newNode);
                this.treeContainer.append(newLevel);
            }
            location.reload();
        },
    
        showError: function (message) {
            this.errorMessage.text(message);
        },
    
        clearError: function () {
            this.errorMessage.text("");
        }
    };
    
    $(document).ready(function () {
        TreeManager.init();
    });