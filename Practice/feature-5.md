# Feature 5

> Add new button Feature 5 to UI

### Checkout to new branch name `feat/feature5`

```
git checkout -b feat/feature5
```

### Create new file `feature5.php` in root folder of project

### Add this code to `feature5.php`:

```
<html>
  <head>
    <title>Demo Fashion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div>
      <h2>Choose to list all products</h2>
      <input type="button" id="feature5" value="Show Feature5 Result" />
      <p />
      <div id="product-list">
      </idv>
    </div>
    <script>

    $(document).ready(function() {
      $("#feature5").click(function(){
          updateProducts('feature5');
      });
    });

    function updateProducts(type) {
      $.ajax({
        url: "api/products.php?type=" + type,
        method: "GET",
        success: function(result) {
          html = '<table cellpadding=10 cellspacing=1 border=1>';
          html += '<tr><th>Id</th><th>Product</th><th>Price</th></tr>'
          $.each(JSON.parse(result), function(index, item) {
            html += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.description + '</td></tr>';
          });
          html += '</table>'
          $( "#product-list" ).html( "<strong>" + html + "</strong>" );
        }
      });
    }
    </script>
  </body>
</html>
```