<?php
require '../../php/conn.php';
$id = $_GET['id'];
$sql = 'DELETE FROM user WHERE id=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: ../admin.php#test2");
}
?>