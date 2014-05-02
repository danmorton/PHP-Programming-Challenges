<?php
/**
 * GreplinChallenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the implementation to perform the Greplin Challenge
 *
 * Challenge Description
 * In the block of text below, find the longest substring that is the same in reverse (palindrome). 
 * As an example, if the input was "Ilikeracecarsthatgofast" the answer would be "racecar". 
 */
 
require_once("Challenge.php");

class GreplinChallenge extends Challenge
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
		//ideally this would be done with recusive regular expressions, but I was unable to find one that could do it and do not feel like writing one...
		
		//lets clean our input to make life easier..
		$input = strtolower(trim($input));
		if (empty($input))
			Challenge::throwError("Input cannot be empty.");
		$currentLength = strlen($input);
		while($currentLength > 0)
		{
			//lets shift our length over our input trying to get the largest palindrome
			$wiggleRoom = strlen($input) - $currentLength;
			for($i = 0; $i<=$wiggleRoom;++$i)
			{
				$subIn = substr($input, $i, $currentLength);
				if ($this->isPalindrome($subIn))
				{
					$this->content_dsc = "Largest Palindrome: ";
					$this->content_out = $subIn; 
					$this->PrintJSON();
				}
			}
			--$currentLength;	
		}
		Challenge::throwError("Unable to find Palindrome.");
		
	}
	
	/*
	 * Determines if input is a palindrome
	 * 
	 * @param string $a possible palindrome
	 * @return bool if it is a palindrome
	 */
	public function isPalindrome($a)
	{
		$b = strrev($a);
	 	return ($b == $a);
	}
	
}