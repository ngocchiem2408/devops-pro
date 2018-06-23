<?php

require_once(dirname(__FILE__) . '/../model/Product.php');

class ProductRepository {
  var $dbConnection;

  function __construct(){
  }

  function __destruct() {
  }

  function getAllMockProducts($feature) {
    $count = 10;
    $items = [];
    while ($count > 0) {
      switch ($feature) {
        case "1":
          $items[] = $this->randomClothes();
          break;
        case "3":
          $items[] = $this->randomSales();
          break;
        case "4":
          $items[] = $this->randomClient();
          break;
        case "5":
          $items[] = $this->randomPrice();
          break;
        default:
          $items[] = $this->createRandomProduct();    
      }
      $count--;
    }
    return $items;
  }

  function getAllProducts() {
    return $this->getAllProductsFromDB();
  }

  function randomClothes() {
    $names = ['Gucci', 'Zara', 'Channel', 'Monblance'];
    $descs = ['The best product ever', 'Flagship of year', 'Welcome to the world of modern citizen', 'Nothing can beat'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)];

    return $product;
  }

  function randomSales() {
    $names = ['iPhone', 'Macbook', 'Galaxy Note 5', 'iPhone X'];
    $descs = ['5000', '6000', '8000', '25000'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)];

    return $product;
  }

  function randomClient() {
    $names = ['James', 'Paul', 'Micheal', 'Peter'];
    $descs = ['iPhone', 'Macbook', 'Galaxy Note 5', 'iPhone X'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)]; 

    return $product;
  }

  function randomPrice() {
    $names = ['iPhone 8', 'Macbook', 'Galaxy Note 5', 'iPhone X'];
    $descs = ['$499', '$599', '$699', '$799'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)];

    return $product;
  }

  function createRandomProduct() {
    $names = ['iPhone', 'Macbook', 'Galaxy Note 5', 'iPhone X'];
    $descs = ['The best product ever', 'Flagship of year', 'Welcome to the world of modern citizen', 'Nothing can beat'];

    $product = new Product();
    $product->id = rand(1000, 10000);
    $product->name = $names[rand(0, count($names) - 1)];
    $product->description = $descs[rand(0, count($descs) - 1)];

    return $product;
  }

  function getAllProductsFromDB() {
    // $schema = 'agileadvn';
    // $sql_u = 'agileadvn';
    // $sql_p = 'agileadvn';
    $this->dbConnection = new mysqli('database', 'agileadvn', 'agileadvn', 'agileadvn');
    if($this->dbConnection->connect_errno) {
      return null;
    }

    $sql = 'SELECT * FROM products';
    $resultSet = $this->dbConnection->query($sql);

    if ($resultSet->num_rows > 0) {
      $products = array();
      while($row = $resultSet->fetch_assoc()) {
        $products[] = $row;
      }

      return $products;
    }
  }
}

?>
