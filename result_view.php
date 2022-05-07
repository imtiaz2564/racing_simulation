<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <ul class="list-group">
    <li class="list-group-item">Fastest car for <?php echo number_format($distance, 2); ?> m is <?php echo $best_car->car_name; ?> and time <?php echo number_format($minimum_time, 2); ?></li>  
  </ul>
</div>

</body>
</html>