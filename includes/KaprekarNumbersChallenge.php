<?php
/**
 * KaprekarNumbersChallenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the implementation to perform the Kaprekar Numbers Challenge
 *
 * Challenge Description
 * Wolfram’s MathWorld describes Kaprekar numbers like this: 
 * 	Consider an n-digit number k. Square it and add the right n digits to the left n 
 * 	or n-1 digits. If the resultant sum is k, then k is called a Kaprekar number. For 
 * 	example, 9 is a Kaprekar number since 9^2 = 81 and 8 + 1 = 9 
 *	and 297 is a Kaprekar number since 297^2 = 88209 and 88 + 209 = 297. 
 *
 * Your task is to write a function that identifies Kaprekar numbers and to determine the Kaprekar numbers 
 * less than a thousand. 
 */
 
require_once("Challenge.php");

class KaprekarNumbersChallenge extends Challenge
{
	/*
	 * Inherited variables:
	 * protected $error_string = null;
	 * protected $content_out = null;
	 * protected $content_dsc = null;
	 */
	
	/**
	 * The main worker
	 * this function will process the input
	 * @param string $input is the input data to be processed, null may be valid for some cases
	 * @return void
	 */
	public function processInput($input)
	{
		if (!is_numeric($input) || $input < 0)
			Challenge::throwError("The Kaprekar Numbers Challenge requires a postive integer.");

		$kaprekarResults = array();
		for($i=0;$i<$input;++$i)
		{
			if ($this->isKaprekarNumber($i))
				$kaprekarResults[] = $i;
		}
		//now lets make output our kaperkars
		$this->content_dsc = "Kaprekar Numbers: ";
		$this->content_out = implode(", ", $kaprekarResults);
	}
	
	/*
	 * Determines if input is a Kaprekar number.
	 * Consider an n-digit number k. Square it and add the right n digits to the left n 
     * or n-1 digits. If the resultant sum is k, then k is called a Kaprekar number. For 
	 * @param int $k the number to test agains above formula
	 * @return bool if it is a kaprekare or not.
	 */
	public function isKaprekarNumber($k)
	{
		$ksqrd = $k*$k;
		$kLength = strlen((string)$k);
		$leftDigits = substr((string)$ksqrd, 0, (-$kLength));
		$rightDigits = substr((string)$ksqrd, (-$kLength));
		$newK = $leftDigits + $rightDigits;
		return ($newK == $k);
	}
	
}