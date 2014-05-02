<?php
/**
 * Challenge.php
 * Developed By Daniel Morton
 * on May 1st, 2014
 *
 * This is the base challenge class.
 */ 

//Deinfes for subclasses
define("endl", "<br/>");//currently endl character for html 
 
abstract class Challenge
{
	/**
	 * string of last error
	 */
	protected $error_string = null;

	/**
	 * the content to display to the user.
	 * ignored if error_string is not null
	 */
	protected $content_out = null;
	
	/**
	 * The descrition of our output.
	 * @dault 'Success: '
	 */
	protected $content_dsc = "Success: ";

	/**
	 * The main worker
	 * this function will process the input
	 * @param string $input is the input data to be processed, null may be valid for some cases
	 * @return void
	 */
	abstract public function processInput($input);

	/**
	 * Print JSON
	 * prepares contents and sens to JSONOut
	 */
	 public function PrintJSON()
	 {
	 	Challenge::JSONOut( array(	"error" => !empty($this->error_string),	 				
		 							"content" => (!empty($this->error_string) ? $this->error_string : $this->content_out),
		 							"description" => $this->content_dsc
		 						  )
	 					  );
	 }
	 
	/**
	 * JSON Out
	 * @param mixed $data to encode as json and echo
	 * @param bool @shouldExit wether we should exit at the end.
	 */
	 public static function JSONOut($data, $shouldExit = true)
	 {
	 	//header so they know json is coming
		header('Content-Type: application/json');
	 	echo json_encode($data);
		if ($shouldExit)
			exit;
	 }	 

	/**
	 * Throw Error
	 * Helper function that sets the error_string and outputs JSON
	 * @param string $errorMsg this is the readable error	 
	 */	 
	 public function throwError($errorMsg)
	 {
	 	Challenge::JSONOut( array(	"error" => true,
		 							"content" => $errorMsg,
		 					 		"description" => "Error: "
		 					 	 )
	 					  );
	 }
	 
}