<html>
	<head>
		<title>Schoology Programming Challenges</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="main.js"></script>
	</head>
	<body>
		<h1>Schoology Programming Challenges</h1>
		<!-- GitHub Forker Curtosy of: https://github.com/blog/273-github-ribbons -->
		<a href="https://github.com/danmorton/PHP-Programming-Challenges"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
		<div class="main">
		
			<div class="challenge">
				<h3>English-Number Translator</h3>
				<form id="ent_form" method="post" action="FormResponder.php">
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="EnglishNumberTranslator">
					<label for="input_data">English Number Representation:</label><br/>
					<input type="text" name="input_data" size="100"><br>					
					<input type="submit" name="submit" value="Translate">
				</form>
				<div id="ent_response" class="form_response" style="display:none;">Response will go here.</div>
			</div><!-- challenge -->
		
			<div class="challenge">
				<h3>Fibonacci Freeze</h3>
				<form id="fib_form" method="post" action="FormResponder.php">						
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="FibonacciFreeze">
					<label for="input_data">Fibonacci Number i of F<sub>i</sub> (One per line):</label><br/>
					<textarea rows="4" cols="72" name="input_data"></textarea><br/>
					<input type="submit" name="submit" value="Calculate">
				</form>
				<div id="fib_response" class="form_response" style="display:none;">Response will go here.</div>
			</div><!-- challenge -->		
		
			<div class="challenge">
				<h3>Kaprekar Numbers</h3>
				<form id="kap_form" method="post" action="FormResponder.php">						
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="KaprekarNumbers">
					<label for="input_data">Calculate Kaprekar Numbers less than:</label><br/>
					<input type="text" name="input_data" size="25" value="1000"><br>
					<input type="submit" name="submit" value="Calculate">
				</form>
				<div id="kap_response" class="form_response" style="display:none;">Response will go here.</div>
			</div><!-- challenge -->

			<!-- TODO Add support for alien numbers... I don't really understand the problem's output/input.
			<div class="challenge">
				<h3>Alien Numbers</h3>
				<form id="aln_form" method="post" action="FormResponder.php">						
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="AlienNumbers">
					<label for="input_data">Aliens???:</label><br/>
					<input type="text" name="input_data" size="25" value="1000"><br>
					<input type="submit" name="submit" value="Calculate">
				</form>
				<div id="aln_response" class="form_response" style="display:none;">Response will go here.</div>
			</div> --><!-- challenge -->	

			<div class="challenge">
				<h3>Happy Numbers</h3>
				<form id="hpy_form" method="post" action="FormResponder.php">						
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="HappyNumbers">
					<label for="input_data">Happy Numbers (Delimited by ','):</label><br/>
					<textarea rows="4" cols="72" name="input_data"></textarea><br/>
					<input type="submit" name="submit" value="Calculate">
				</form>
				<div id="hpy_response" class="form_response" style="display:none;">Response will go here.</div>
			</div><!-- challenge -->					

			<div class="challenge">
				<h3>Greplin Challenge</h3>
				<form id="grp_form" method="post" action="FormResponder.php">						
					<input type="hidden" name="process_token" value="could_be_based_off_session">
					<input type="hidden" name="challenge" value="Greplin">
					<label for="input_data">Large portion of text to find largets palindrome:</label><br/>
					<textarea rows="4" cols="72" name="input_data"></textarea><br/>
					<input type="submit" name="submit" value="Calculate">
				</form>
				<div id="grp_response" class="form_response" style="display:none;">Response will go here.</div>
			</div><!-- challenge -->					
			
		<div><!-- main -->		
	</body>
</html>
