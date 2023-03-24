<!DOCTYPE html>
<html>
<head>
	<title>Php-Calculate Electricity Bill</title>
</head>
<body>
	<h1>Php-Calculate Electricity Bill</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input placeholder="Please enter no. of Units" type="number" name="units" id="units" required>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$units = $_POST["units"];
		$totalBill = 0;
		if($units <= 50) {
			$totalBill = $units * 3.5;
		} elseif($units <= 150) {
			$totalBill = 50 * 3.5;
			$remainingUnits = $units - 50;
			$totalBill += $remainingUnits * 4;
		} elseif($units <= 250) {
			$totalBill = 50 * 3.5 + 100 * 4;
			$remainingUnits = $units - 150;
			$totalBill += $remainingUnits * 5.2;
		} else {
			$totalBill = 50 * 3.5 + 100 * 4 + 100 * 5.2;
			$remainingUnits = $units - 250;
			$totalBill += $remainingUnits * 6.5;
		}

		echo "<p>Total amount $units units - $totalBill </p>";
	}
	?>
</body>
</html>
