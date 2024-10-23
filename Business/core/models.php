<?php

function insertDesigner($pdo, $firstName, $lastName, $d_address, $age, $specialization, $e_address) {
    $sql = "INSERT INTO designers_info (firstName, lastName, d_address, age, specialization, e_address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $d_address, $age, $specialization, $e_address]);

    return $executeQuery;
}

function updateDesigner($pdo, $firstName, $lastName, $d_address, $age, $specialization, $e_address, $designerID) {
    $sql = "UPDATE designers_info
            SET firstName = ?, lastName = ?, d_address = ?, age = ?, specialization = ?, e_address = ?
            WHERE designerID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $d_address, $age, $specialization, $e_address, $designerID]);

    return $executeQuery;
}

function deleteDesigner($pdo, $designerID) {
    $deleteDesignerSQL = "DELETE FROM designs WHERE designerID = ?";
    $deleteStmt = $pdo->prepare($deleteDesignerSQL);
    $executeDeleteQuery = $deleteStmt->execute([$designerID]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM designers_info WHERE designerID = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$designerID]);

        return $executeQuery;
    }
    return false;
}

function getAllDesigners($pdo) {
    $sql = "SELECT * FROM designers_info";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getDesignerByID($pdo, $designerID) {
    $sql = "SELECT * FROM designers_info WHERE designerID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$designerID]);

    return $stmt->fetch();
}

function getDesignsByDesigners($pdo, $designerID) {
    $sql = "SELECT designs.designID, designs.designName, designs.fabricType, designs.price, designs.date_added,
                   CONCAT(designers_info.firstName, ' ', designers_info.lastName) AS Designer_Owner
            FROM designs
            JOIN designers_info ON designs.designerID = designers_info.designerID
            WHERE designs.designerID = ?
            ORDER BY designs.designName";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$designerID]);

    return $stmt->fetchAll();
}

function insertDesigns($pdo, $designName, $fabricType, $price, $designerID) {
    $sql = "INSERT INTO designs (designName, fabricType, price, designerID) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$designName, $fabricType, $price, $designerID]);

    return $executeQuery;
}

function getDesignByID($pdo, $designID) {
    $sql = "SELECT designs.designID, designs.designName, designs.fabricType, designs.price, designs.date_added,
                   CONCAT(designers_info.firstName, ' ', designers_info.lastName) AS Designer_Owner
            FROM designs
            JOIN designers_info ON designs.designerID = designers_info.designerID
            WHERE designs.designID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$designID]);

    return $stmt->fetch();
}

function updateDesign($pdo, $designName, $fabricType, $price, $designID) {
    $sql = "UPDATE designs
            SET designName = ?, fabricType = ?, price = ?
            WHERE designID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$designName, $fabricType, $price, $designID]);

    return $executeQuery;
}


function deleteDesign($pdo, $designID) {
    $sql = "DELETE FROM designs WHERE designID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$designID]);

    return $executeQuery;
}

?>
