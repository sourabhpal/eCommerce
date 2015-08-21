<html>
<head>
  <meta charset="UTF-8">
  <title>Semi Restful Route Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
      .container-form {
        width: 400px;
        vertical-align: middle;
        text-align: center;
      }
      .container-table {
        vertical-align: middle;
        text-align: center;
      }
      button {
        float: left;
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
        padding: 5px;
      }
      .alert {
        text-align: center;
        max-width: 500px;
        margin: 10px auto;
      }
      h3 {
        text-align: center;
      }
    </style>
</head>
<body>
  <h3>Products</h3>
  <div class="container container-table">
    <table class="table-striped">
      <thead>
        <td>Description</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Actions</td>
      </thead>
      <tbody>
  <?php 
  foreach ($id as $key => $value)
    {
      ?>
      <tr>
        <td> <?php echo $description[$key]; ?></td>
        <td> <?php echo $price[$key]; ?></td>
        <td>
          <select>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
        <td><a href="/products/add_cart/<?php echo $value;?> ">Buy</a></td>
      </tr>
  <?php
    }
  ?>
      </tbody>
    </table>
</body>
</html>