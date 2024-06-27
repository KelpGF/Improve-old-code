<?php

$connection = new DbConnect();
$dbConnection = $connection->connecting('localhost', 'test', 'root', '');
$orderProductDb = new OrderProductDb($dbConnection);

if (isset($_POST['edit_products_order'])) { // router
  $id_order = isset($_POST['id_order']) ? $_POST['id_order'] : '';
  $products_order = isset($_POST['products_order']) ? $_POST['products_order'] : '';

  $errors = [];
  
  foreach ($products_order as $idx => $data) {
      if (!$orderProductDb->edit_products_order($id_order, $idx, $data['qtd'], $data['action'])) {
          array_push($errors, [
              'id_product' => $idx,
              'product' => $data['product'],
              'action' => $data['action']
          ]);
      }
  }
  echo json_encode($errors);
}

