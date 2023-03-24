<!DOCTYPE html>
<html>
<head>
	<title>Simple Calculator</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}

		.container {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: ffffff;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		h1 {
			text-align: center;
			margin-top: 0;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		label {
			font-size: 1.2rem;
			margin-bottom: 10px;
			display: block;
			text-align: center;
		}

		input[type="number"], select {
			font-size: 1.2rem;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			font-size: 1.2rem;
			padding: 10px 20px;
			background-color: #008CBA;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		p {
			font-size: 1.5rem;
			margin-top: 1;
			text-align: center;
		}

		.error {
			color: #f00;
			font-size: 1.2rem;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Simple Calculator</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label for="num1">Enter first number:</label>
			<input type="number" name="num1" id="num1" required>
			<label for="num2">Enter second number:</label>
			<input type="number" name="num2" id="num2" required>
			<label for="operator">Select an operator:</label>
			<select name="operator" id="operator">
				<option value="+">Addition</option>
				<option value="-">Subtraction</option>
				<option value="*">Multiplication</option>
				<option value="/">Division</option>
			</select>
			<input type="submit" name="submit" value="Calculate">
		</form>

		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$num1 = $_POST["num1"];
			$num2 = $_POST["num2"];
			$operator = $_POST["operator"];

			switch ($operator) {
				case "+":
					$result = $num1 + $num2;
					echo "<p>Answer:  $result</p>";
					break;
				case "-":
					$result = $num1 - $num2;
					echo "<p>Answer:  $result</p>";
					break;
				case "*":
					$result = $num1 * $num2;
					echo "<p>Answer:  $result</p>";
					break;
                    case "/":
                        if ($num2 == 0) {
                            echo "<p>Division by zero error!</p>";
                        } else {
                            $result = $num1 / $num2;
                            echo "<p>Answer: $result</p>";
                        }
                        break;
                    default:
                        echo "<p>Invalid operator selected!</p>";
                }
            }
            ?>
        </body>
        </html>