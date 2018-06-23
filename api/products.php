<?php
require_once('../storage/ProductRepository.php');

$productRepository = new ProductRepository();
$items = $productRepository->getAllMockProducts($feature = "0");
if (isset($_GET['type'])) {
  switch ($_GET['type']) {
    case "real":
      $items = $productRepository->getAllProducts();
      break;
    case "feature1":
      $items = $productRepository->getAllMockProducts($feature = "1");
      break;
    case "feature2":
      $items = "This is random string";
      break;
    case "feature3":
      $items = $productRepository->getAllMockProducts($feature = "3");
      break;
    case "feature4":
      $items = $productRepository->getAllMockProducts($feature = "4");
      break;
    case "feature5":
      $items = $productRepository->getAllMockProducts($feature = "5");
      break;
    case "feature6":
      $items = $productRepository->getAllProducts();
      break;
    default:
      $items = "error";
  }
}

sendResponse(200, json_encode($items));

function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
  $status_header = 'HTTP/1.1 ' . $status . ' OK';
  header($status_header);
  header('Content-type: ' . $content_type);
  echo $body;
}
?>
