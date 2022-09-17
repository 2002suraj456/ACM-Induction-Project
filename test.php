<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
test.php
<script>
	const myName = "Suraj Soren";

	const tagString = `<h1>${myName}</h1>
	<div id="outerDiv">
		<div id="innerDiv">
			<input type="button" value="hello world" id="mainButton">
			<label for="mainButton"></label>
		</div>
	</div>`;


	function fragmentFromString(strHTML) {
		return document.createRange().createContextualFragment(strHTML);
	}

	// console.log();
	document.addEventListener("DOMContentLoaded", function() {
		document.querySelector('#main_div').append(fragmentFromString(tagString));
	})
</script>

<body>
	<div id="main_div"></div>
</body>

</html>