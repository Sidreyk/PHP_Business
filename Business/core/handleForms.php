<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Insert a new designer
if (isset($_POST['insertDesignerBtn'])) {
    $query = insertDesigner($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['d_address'], $_POST['age'], $_POST['specialization'], $_POST['e_address']);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Insertion Failed";
    }
}

// Edit an existing designer
if (isset($_POST['editDesignerBtn'])) {
    $query = updateDesigner($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['d_address'], $_POST['age'], $_POST['specialization'], $_POST['e_address'], $_GET['designerID']);

    if ($query) {
        header("Location: ../index.php");
        exit(); 
    } else {
        echo "Edit Failed";
    }
}

// Delete a designer
if (isset($_POST['deleteDesignerBtn'])) {
    $query = deleteDesigner($pdo, $_GET['designerID']);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Deletion Failed";
    }
}

// Insert a new design
if (isset($_POST['insertNewDesignBtn'])) {
    $query = insertDesigns($pdo, $_POST['designName'], $_POST['fabricType'], $_POST['price'], $_GET['designerID']);

    if ($query) {
        header("Location: ../viewdesigns.php?designerID=" . $_GET['designerID']);
        exit(); 
    } else {
        echo "Insertion Failed";
    }
}


if (isset($_POST['editDesignBtn'])) {
    // Check if designID is provided
    if (isset($_GET['designID'])) {
        $query = updateDesign($pdo, $_POST['designName'], $_POST['fabricType'], $_POST['price'], $_GET['designID']);

        if ($query) {
            header("Location: ../viewdesigns.php?designerID=" . $_GET['designerID']);
            exit(); 
        } else {
            echo "Update Failed";
        }
    } else {
        echo "No design ID provided.";
    }
}

// Delete a design
if (isset($_POST['deleteDesignBtn'])) {
    $query = deleteDesign($pdo, $_GET['designID']);

    if ($query) {
        header("Location: ../viewdesigns.php?designerID=" . $_GET['designerID']);
        exit(); 
    } else {
        echo "Deletion Failed";
    }
}
?>
