# Feature 2

> Add new button Feature 2 to UI

### Checkout to new branch name `feat/feature2`

```
git checkout -b feat/feature2
```

### Create new file `feature2.php` in root folder of project

### Add this code to `feature2.php`:

```
<html>
  <head>
    <title>DevOps Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div>
      <h2>Choose to list all products</h2>
      <input type="button" id="feature2" value="Show Feature2 Result" />
      <p />
      <div id="product-list">
      </idv>
    </div>
    <script>

    $(document).ready(function() {
      $("#feature2").click(function(){
          updateProducts('feature2');
      });
    });

    function updateProducts(type) {
      $.ajax({
        url: "api/products.php?type=" + type,
        method: "GET",
        success: function(result) {
          $( "#product-list" ).html( "<b>" + result + "</b>" );
        }
      });
    }
    </script>
  </body>
</html>
```