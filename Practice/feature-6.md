# Feature 6

> Add new button Feature 6 to UI

### Checkout to new branch name `feat/feature6`

```
git checkout -b feat/feature6
```

### Create new file `feature1.php` in root folder of project

### Add this code to `feature1.php`:

```
<html>
  <head>
    <title>Demo Fashion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div>
      <h2>Choose to list all products</h2>
      <input type="button" id="feature6" value="Show Feature6 Result" />
      <p />
      <div id="product-list">
      </idv>
    </div>
    <script>

    $(document).ready(function() {
      $("#feature6").click(function(){
          updateProducts('feature6');
      });
    });

    function updateProducts(type) {
      $.ajax({
        url: "api/products.php?type=" + type,
        method: "GET",
        success: function(result) {
          html = '<table cellpadding=10 cellspacing=1 border=1>';
          html += '<tr><th>Id</th><th>Name</th><th>Description</th><th>Price</th></tr>'
          $.each(JSON.parse(result), function(index, item) {
            html += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.description + '</td><td>' + item.price + '</td></tr>';
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

### Change file `model/Product.php` to new content:

```
<?php
class Product {
  var $id;
  var $name;
  var $description;
  var $price;

  function __construct(){
  }

  function __destruct() {
  }
}

?>
```

### Change file `db/scripts.sql` to new content:

```
create table products(
  id int,
  name varchar(50),
  description varchar(100),
  price varchar(30)
);

insert into products values(1001, N'iPhone X', N'The best phone ever', N'$699');
insert into products values(1002, N'Samsung Galaxy Note 8', N'The phone of new world', N'$599');
insert into products values(1002, N'Macbook Pro', N'The best PC', N'$2499');
alter user 'agileadvn'@'%' identified with mysql_native_password by 'agileadvn';
flush privileges;
```