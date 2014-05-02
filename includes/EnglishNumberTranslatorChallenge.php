<?php
/**
 * EnglishNumberTranslatorChallenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the implementation to perform the English-Number Translator Challenge
 *
 * Challenge Description
 * In this problem, you will be given one or more integers in English. Your task is to translate these numbers 
 * into their integer representation. The numbers can range from negative 999,999,999 to positive 
 * 999,999,999. The following is an exhaustive list of English words that your program must account for: 
 * negative, zero, one, two, three, four, five, six, seven, eight, nine, ten, eleven, twelve, thirteen, fourteen, 
 * fifteen, sixteen, seventeen, eighteen, nineteen, twenty, thirty, forty, fifty, sixty, seventy, eighty, ninety, 
 * hundred, thousand, million
 *
 * Notes on input:
 * • Negative numbers will be preceded by the word negative. 
 * • The word ``hundred'' is not used when ``thousand'' could be. For example, 1500 is written ``one
 * thousand five hundred'', not ``fifteen hundred''.
 *
 * SAMPLE INPUT
 * 	six, negative seven hundred twenty nine, one million one hundred one 
 * SAMPLE OUTPUT 
 * 	6, -729, 1000101
 */
 
require_once("Challenge.php");

class EnglishNumberTranslatorChallenge extends Challenge
{
	/*
	 * Inherited variables:
	 * protected $error_string = null;
	 * protected $content_out = null;
	 * protected $content_dsc = null;
	 */
	
	 /**
	  * English to Number is used to translate a number from word to int
	  * @key string representation of number in english
	  * @value int representation of number as int
	  * @note added 'and' as it seems logical.. value of 0
	  */
	 private $EnglishToNumber = array("negative" => -1, "zero" => 0, "one" => 1, "two" => 2, "three" => 3, "four" => 4, "five" => 5, "six" => 6, "seven" => 7, "eight" => 8, "nine" => 9, "ten" => 10, "eleven" => 11, "twelve" => 12, "thirteen" => 13, "fourteen" => 14, "fifteen" => 15, "sixteen" => 16, "seventeen" => 17, "eighteen" => 18, "nineteen" => 19, "twenty" => 20, "thirty" => 30, "forty" => 40, "fifty" => 50, "sixty" => 60, "seventy" => 70, "eighty" => 80, "ninety" => 90, "hundred" => 100, "thousand" => 1000, "million" => 1000000, "and" => 0);
	
	/**
	 * The main worker
	 * this function will process the input
	 * @param string $input is the input data to be processed, null may be valid for some cases
	 * @return void
	 */
	public function processInput($input)
	{
		//the first thing we need to do is try exploding our input.
		$englishNumbers = explode(",", $input);
		$finalNumbers = array();
		//now lets loop through and process our content
		foreach($englishNumbers as $eNumber)
		{
			//clean our number up to avoid not being able to identify the word due to a space or uppercase letter.
			$eNumber = strtolower(trim($eNumber));
			if (empty($eNumber)) //make sure we have some content to process, if not it could just be a trailing comma
				continue;
			$resultNumber = 0;
			//so the first thing we do is explode our number string by spaces, then reverse it so negative will be at the end, making it's handling more elegant.
			$numberPieces = array_reverse( explode(" ", $eNumber) );
			//since million thousand hundred all depend on next number, we will handle with a mutliplier
			$numberMultiplier = 1;
			foreach($numberPieces as $word)
			{
				//we need to validate this word is defined in our EnglishToNumber list.
				if (isset($this->EnglishToNumber[$word]))
				{					
					//one hundred
					if ($resultNumber<0) //if our number already been conveted to negative? if so they messed up
						Challenge::throwError("Negative misplaced in '{$eNumber}'. Negative can only be present at start of a number.");
					if ("negative" == $word)
					{
						//doing a times equal will allow our negative to take effect..
						$resultNumber *= $this->EnglishToNumber[$word];
					}
					//any number greater than 90 is a multiplier.. and relies on next number...
					else if ($this->EnglishToNumber[$word] > 90)
					{
						//we have the multiplier keep compouding if previous multiplier is larger than next.
						//this allows us to handle for craziness like 'two hundred fifty six thousand and forty two',
						if ($numberMultiplier > $this->EnglishToNumber[$word])
							$numberMultiplier *= $this->EnglishToNumber[$word];
						else //else reset it, so 'one million one hundred one' also works.
							$numberMultiplier = $this->EnglishToNumber[$word];
					}
					else
					{
						//now we can just simply add our translated number to our resultNumber
						$resultNumber += ($numberMultiplier * $this->EnglishToNumber[$word]);
						//reset number multiplier for next word
						//$numberMultiplier = 1;
					}
				}
				else
				{
					Challenge::throwError("Invalid english number ({$word}).<br/>If you believe this is a bug please contact support.");
				}
			}
			//lets save all of our numbers to output...
			$finalNumbers[] = $resultNumber;
		}
		$this->content_out = implode(", ", $finalNumbers);
	}
}