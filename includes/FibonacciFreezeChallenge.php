<?php
/**
 * FibonacciFreezeChallenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the implementation to perform the Fibonacci Freeze Challenge
 *
 * Challenge Description
 * The Fibonacci numbers (0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ...) are defined by the recurrence: 
 * F0 = 0 
 * F1 = 1
 * Fi = Fi-1 +Fi-2 for all i >=2
 * Write a program to calculate the Fibonacci Numbers. 
 * 
 * The input to your program would be a sequence of numbers smaller or equal than 5000, each on a 
 * separate line, specifying which Fibonacci number to calculate. 
 * Your program should output the Fibonacci number for each input value, one per line
 */
 
require_once("Challenge.php");

class FibonacciFreezeChallenge extends Challenge
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
		//The directions says output should be per line but the sample show seperated by comma, so lets do both
		$fibonacciFreezers = split(",|\n|\r",$input);
		$fibonacciResults = array();
		foreach($fibonacciFreezers as $fibTo)
		{
			$fibTo = trim($fibTo); //we don't like spaces...
			//lets do some validation. so we don't have weird results...
			if (is_numeric($fibTo) && $fibTo > 2)
				$fibonacciResults[] = $this->performFibonacci($fibTo);
			//we only want to throw an error if it is invalid non-empty character.
			else if (!empty($fibTo)) 
				Challenge::throwError("i values for F<sub>i</sub> must be postotive integers >= 2, you supplied '{$fibTo}'.<br/>If you believe this is a bug please contact support.");
		}
		//now lets make our content one per line... per the instructions
		$this->content_out = implode(endl, $fibonacciResults);
	}
	
	/*
	 * Performs fibonacci based on following formula
	 * F0 = 0 
	 * F1 = 1
	 * Fi = Fi-1+Fi-2 for all i >=2	
	 * @param int $fibTo is i in the formula
	 * @param int $i the current index in our fibonacci
	 * @param int $im1 is Fi-1
	 * @param int $im1 is Fi-2
	 */
	public function performFibonacci($fibTo, $i = 2, $im1 = 1, $im2 = 0)
	{
		$Fi = $im1 + $im2;
		if ($i == $fibTo)
			return $Fi;
		return $this->performFibonacci($fibTo, ++$i, $Fi, $im1);
	}
	
}