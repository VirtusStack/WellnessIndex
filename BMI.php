<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WellnessIndex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .navbar-dark-blue {
      background-color: #002244;
    }
    .navbar-brand {
      font-size: 32px;
      font-family: Georgia, serif;
    }
    .result {
      background-color: #d4edda;
      padding: 15px;
      border-radius: 6px;
    }
     .dark-blue-bg {
      background-color: #002244;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark navbar-dark-blue">
  <div class="container-fluid justify-content-center">
    <a class="navbar-brand" href="#">WELLNESSINDEX</a>
 </div>
</nav>
<div class="container mt-5">
  <h2 class="text-primary">Calculate Your BMI </h2>
  <p>Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women. Your BMI is just one piece of the puzzle. It’s based on height and weight but doesn’t take into account your muscle mass, bone density, or body composition. Your healthcare provider will consider whether your BMI is too high or too low for you.</p> 
<form method="post">
 <div class="card" style="width:600px;">
<div class="card-header dark-blue-bg  text-white fs-4">BMI Calculator</div>
 <div class="card-body fs-4">
<div class="mb-3"> 
<label>Weight (kg):</label> 
<input type="number" name="weight" step="0.1" class="form-control" required value="<?php if(isset($_POST['weight'])) echo $_POST['weight']; ?>">
  </div>
  <div class="mb-3">
 <label>Height (cm):</label>
<input type="number" name="height" step="0.1" class="form-control" required value="<?php if(isset($_POST['height'])) echo $_POST['height']; ?>">
</div>
<div class="d-flex gap-2">
  <button type="submit" name="calculate" class="btn btn-primary">Calculate BMI</button>
 <a href ="BMI.php" class="btn btn-secondary">Reset</a>  <!-- Reset as page reload -->
</div>
</form>
<?php
$bmi = '';
$class = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($height == 0) {
        $bmi = "Height cannot be zero.";
    } else {
        $heightMeters = $height / 100;
        $bmiValue = $weight / ($heightMeters * $heightMeters);
        $bmi = round($bmiValue, 2);

        if ($bmi < 18.5) {
            $class = "Underweight";
        } elseif ($bmi < 25) {
            $class = "Normal weight";
        } elseif ($bmi < 30) {
            $class = "Overweight";
        } else {
            $class = "Obese";
        }
    }
}

if (isset($_POST['reset'])) {
    $_POST['weight'] = '';
    $_POST['height'] = '';
    $bmi = '';
    $class = '';
}
if(!empty($bmi) && !empty($class)){
echo "<div class='result mt-4'>";
echo "<h5>Your BMI is: $bmi</h5>";
echo "<p>You are classified as: <strong>$class</strong></p>";
echo "</div>";
}
?>
</div>
 </div>
</div>
</div>
</div>
<div class="container mt-4">
<h2 class="text-primary g-4">BMI Table for adults</h2>
<p>This is the World Health Organization's (WHO) recommended body weight based on BMI values for adults. It is used for both men and women, age 20 or older.</p>
<div class="table-responsive ">
<table class= "table table-bordered table-striped">
<thead>
<tr class="fs-4">
<th>BMI Range</th>
<th>Category</th>
</tr>
</thead>
<tbody>
<tr>
<td>Below 18.5</td>
<td>Underweight</td>
</tr>
<tr>
<td>18.5 - 24.9</td>
<td>Normal weight</td>
</tr>
<tr>
<td>25 - 29.9</td>
<td>Overweight</td>
</tr>
<tr>
<td>30 and above</td>
<td>Obese</td>
</tr>
</tbody>
</table>
</div>
<h2 class="text-primary g-4">BMI as a measure</h2>
<p>BMI is a calculated measure of a person's body weight (in kilograms) divided by the square of their height (in meters).<br>
<strong> BMI = weight (kg) / height (m)2 </strong> <br>
BMI does not distinguish between fat, muscle, and bone mass. These all influence a person's weight. BMI does not indicate what types of fat people have. BMI also does not indicate where in the body that people carry fat.</p>
<h2 class="text-primary g-4">BMI for individual health</h4>
<p>BMI is one measure that an individual and their health care provider can use to help determine chronic disease risk. For a more complete picture of an individual's health, consider BMI with other factors:</p>
<ul>
<li> <strong> Medical history </strong>, such as existing health conditions and family history.</li>
<li> <strong> Health behaviors </strong>, such as diet, physical activity, and sleep. </li>
<li> <strong> Physical exam findings </strong> , such as blood pressure and muscle mass.</li>
<li> <strong> Laboratory findings </strong> , such as glucose and cholesterol levels. </li>
</ul>
</div>  
<footer class="navbar-dark navbar-dark-blue text-white  pt-4 pb-3 mt-5 ">
<div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 ">
 <span class="fs-5">&copy; 2025  WellnessIndex  All rights reserved.</span>
    <div>
    <a href="#" class="btn btn-primary rounded-circle text-white me-3"><i class="bi bi-facebook"></i></a>
    <a href="#" class="btn btn-info rounded-circle text-white me-3"><i class="bi bi-twitter"></i></a>
    <a href="#" class="btn btn-danger rounded-circle text-white me-3"><i class="bi bi-youtube"></i></a>
    <a href="#" class="btn btn-danger rounded-circle text-white"><i class="bi bi-instagram"></i></a>
    <a href="#" class="btn btn-dark rounded-circle text-white"><i class="bi bi-github"></i></a>
  </div>
</div>
</footer>
</body>
</html>

    