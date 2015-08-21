<html>
<head>
  <meta charset="UTF-8">
  <title>eCommerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
      .container-form {
        width: 400px;
        vertical-align: middle;
        text-align: center;
        margin: 10px auto;
      }
      .container-table {
        vertical-align: middle;
        text-align: center;
      }
      button {
        float: right;
        margin-top: 5px;
        margin-left: 150px;
      }
      .form-control {
        margin: 5px;
      }
      table {
        margin: 50px auto;
      }
      thead {
        background-color: gray;
        color: white;
        padding: 5px;
      }
      td {
        padding: 15px;
      }
      .alert {
        text-align: center;
        max-width: 500px;
        margin: 10px auto;
      }
      h3 {
        text-align: center;
      }
      .left {
        text-align: left;
      }
      .right {
        text-align: right;
        margin-top: -30px;
      }
      .header {
        width: 500px;
        margin: 0 auto;
        display: block;
      }
      #delete {
        color: red;
        font-weight: 900;
      }
    </style>
</head>
<body>
  <div class="header"><h3 class="left">Checkout</h3><h4 class="right"><a href="/products">Continue Shopping</h4></a></div>
  <div class="container container-table">
      <table class="table-striped">
        <thead>
          <td>Quantity</td>
          <td>Description</td>
          <td>Price</td>
          <td>Actions</td>
        </thead>
        <tbody>
          <?php 
          foreach ($id as $key => $value)
            {
              ?>
              <tr>
                <td> <?php echo $quantity[$key]; ?></td>
                <td> <?php echo $description[$key]; ?></td>
                <td>$<?php echo $price[$key]; ?></td>            
                <td><a id="delete" href="/products/remove_item/<?php echo $product_id[$key];?> ">Delete</a></td>
              </tr>
          <?php
            }
          ?>
          <tr>
            <td></td>
            <td><h4><strong>Total</h4></strong></td>
            <td><strong>$<?php echo $total; ?></strong></td>
          </tr>
        </tbody>
      </table>
      <div class="container-form">
        <h3>Billing Info</h3>
        <form class="form-group" action="" method="post" role="form">
          <input class="form-control" type='text' placeholder='Name' name='name' required>
          <input class="form-control" type='text' placeholder='Address' name='address' required>
          <input class="form-control" type='text' placeholder='Card #' name='credit_card' required>
          <button type="submit" class="btn-primary">Order</button>
        </form>
      </div>
</body>
</html>