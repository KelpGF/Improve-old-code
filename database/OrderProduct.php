<?php

class OrderProduct
{

  // Executando
  public function edit_products_order($id_order, $id_product, $qtd, $action)
  {
    $connect = new Connect();
    $connection = $connect->connecting();

    try {
      switch ($action) {
        case 'add':
          $sql = "INSERT INTO order_product VALUES
                                (null, :id_order, :id_product, :qtd)";
          break;
        case 'edit':
          $sql = "UPDATE order_product SET qtd = :qtd
                                WHERE id_order_fk = :id_order AND id_product_fk = :id_product";
          break;
        case 'del':
          $sql = "DELETE FROM order_product
                                WHERE id_order_fk = :id_order AND id_product_fk = :id_product";
          break;
      }

      $consult = $connection->prepare($sql);

      $consult->bindValue(":id_order", $id_order);
      $consult->bindValue(":id_product", $id_product);
      ($action != 'del') && $consult->bindValue(":qtd", $qtd);

      return $consult->execute();
    } catch (PDOException $e) {
      echo "Error on $action product order: " . $e->getMessage();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
