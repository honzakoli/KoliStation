<?php
/*
** Guess the Number game
*/

$num = rand(2,99);
/* DEBUG echo "My random number: ".$num."\n"; */

$min = 2;
$max = 99;
$cnt = 1;
echo "Welcome to the \"Guess the Number\" game!\n";

while (1){
	// in-game menu 
	echo "main menu: 1 - play   2 - rules 0 - exit\n";

	if (!is_numeric($action = trim(fgets(STDIN, 1024))))
	{
		echo "read the instruction please\n";
		continue;
	}

	switch ($action) {
		case '1':
			echo "new game\n";
			echo "exit game - 0\n";
			
			// game algorhytm
			while (1)
				{
				echo "The Number is in the interval of <". $min . ", " . $max . ">\n";
				echo "Guess #". $cnt . ":";
	
				// if the input is "0" then exit the play section
				if (($input = trim(fgets(STDIN, 1024))) === "0")
				{
						echo "You failed this time\n";
						echo "See you next time!\n";
						break;
				}
				
				// search whether the $input equals $num or not	
				if ($input == $num)
				{
					echo "You are right! The number really is " . $num . "!\n";
					echo "Number of Guesses: ". $cnt . "\n";
					echo "Well done!\n";
					$cnt = 1;
					$min = 2;
					$max = 99;
					$num = rand(2,99);
					echo "My random number: ".$num."\n";
					break;
				}

				if ($input > $num)
				{
					$max = $input;
					$cnt++;
					continue;
				}

				if ($input < $num)
				{
					$min = $input;
					$cnt++;
					continue;
				}
				

					
				}
		
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
