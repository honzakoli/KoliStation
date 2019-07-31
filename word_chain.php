<?php
/*
** word chain game
*/

// wordchain created by the user
$wordChain = NULL;
// last character of the input
$endChar = NULL;
// highscore storage
$score = 0;
// the real length of the input
$wordLength = NULL;

// start of the program
echo "Welcome to the game called word chain! \n";

while (1){
	// in-game menu 
	echo "main menu: 1 - play   2 - rules 0 - exit\n";
	// check if the user chose one of the menu options
	if (!is_numeric($action = trim(fgets(STDIN, 1024))))
	{
		echo "read the instruction please\n";
		continue;
	}
	
	// choose action from the menu -> user input
	switch ($action)
	{
		// play section
		case 1:
			echo "new game\n";
			echo "exit game - 0\n";
			echo "type a word: ";
			while (1)
			{	
		
				// user input

				// if the input is "0" then exit the play section
				if (($word = trim(fgets(STDIN, 1024))) === "0")
				{
					echo "your final score is: $score\n";
					echo "See you next time!\n";
					break;
				}		
	 
				// check if the input is a valid string (a-z)
				if (!strpbrk($word,'a-z'))
				{
					echo "invalid input! try again: ";
					continue;
				}
				// set the $wordLenght to a current input length	
				$wordLength = strlen($word) - 1;
	
				// true when there is already a word in the chain
				// if not, create a new one
				if ( $wordChain ) 	
				{
					/*
					**	check if there is no duplicity in the chain
					**  check if the last char of the chain match the first char in input
					*/
					if ( ($word[0] == $endChar) && 
					   (strpos($wordChain, $word) === false)) 
					{
						$wordChain = $wordChain . "->" . $word;
						$score++;
					}
					else 
					{
						echo "bad input! try again: ";
						continue;
					}
				}
				else 
				{
					$wordChain = "$word";
					$score = 1;
				}

				$endChar = $word[$wordLength];
				echo "score = $score\n";
				echo "$wordChain\n";
				echo "type next word: ";	
			}
			break;
		// display the rules
		case 2: 
			echo "rules coming soon\n";
			break;
		// exit the game
		case 0:
			exit;
		// invalid input
		default:
			echo "follow the instruction please\n";
			break;
	}
}
