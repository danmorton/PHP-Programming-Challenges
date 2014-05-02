<?php
/**
 * HappyNumbersChallenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the implementation to perform the Greplin Challenge
 *
 * Challenge Description
 * A happy number is defined by the following process. Starting with any positive integer, replace the 
 * number by the sum of the squares of its digits, and repeat the process until the number equals 1 (where it 
 * will stay), or it loops endlessly in a cycle which does not include 1. Those numbers for which this process 
 * ends in 1 are happy numbers, while those that do not end in 1 are unhappy numbers (or sad numbers). 
 * 
 * Write a function that takes an array of numbers and filters out non-happy numbers (i.e. it returns an array 
 * of happy numbers).
 */
 
require_once("Challenge.php");

class HappyNumbersChallenge extends Challenge
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
		//so let take our input and make it happy.

		$allNumbers = explode(",", $input);
		//A happy number is a number that when it is replaced by sum of the square of it's digits while eventaully turn to 1
		$becauseImHappy = array();
		foreach($allNumbers as $number)
		{
			$number = trim($number);//clean up and validate our number
			if (!is_numeric($number))
				Challenge::throwError("Found super unhappy number, as it is not a number ({$number}).");
			if ($this->isHappyNumber($number))
				$becauseImHappy[] = $number;
				
		}
		$this->content_dsc = "Happy Numbers: ";
		$this->content_out = implode(", ", $becauseImHappy); 
		$this->PrintJSON();
		
	}	
	
	/**
	 * Determine if input number is considered happy like the following example
	 * 7 is happy. 7^2=49,4^2+9^2=16+81=97,9^2+7^2=81+49=130,1^2+3^2+0^2,1+9+10=1^2+9^2+0^2=1
	 *
	 * @param int $a number to test happiness
	 * @param array $history of our $numbers, to avoid endless loop
	 * @return bool if it is happy
	 */
	public function isHappyNumber($number, $history = array())
	{
		if (empty($history)) //add our start number to our history if we are just starting...
			$history[] = $number;
		//split our number to individual integers...
		$chunks = str_split($number);
		$newNumber = 0;
		foreach($chunks as $a)
		{
			$newNumber += $a*$a;
		}
		if ($newNumber == 1)
			return true;
		if (in_array($newNumber, $history))
			return false;
		//lets add our new number to our history...
		$history[] = $newNumber;
		return $this->isHappyNumber($newNumber, $history);
	}
	
}