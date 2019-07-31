<?php 
// Memory Game

echo "Welcome to the game called \"Memory Game\"!\n";

// back of the memory card deck
$displayArr = ["x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"];
// front of the memory card deck
$memoryArr  = ["!","!","@","@","#","#","$","$","%","%","&","&","{","{","<","<"];

// number of matches
$cnt = 0;

// memory item 1
$i1 = null;
// memory item 2
$i2 = null;

// shuffle the memory card deck;
shuffle($memoryArr);

while (1)
{
	// print the back of the memory card deck; 
	echo $displayArr[0]  . " " . $displayArr[1]  . " " . $displayArr[2]  . " " . $displayArr[3]  . " " . "\n";
	echo $displayArr[4]  . " " . $displayArr[5]  . " " . $displayArr[6]  . " " . $displayArr[7]  . " " . "\n";
	echo $displayArr[8]  . " " . $displayArr[9]  . " " . $displayArr[10] . " " . $displayArr[11] . " " . "\n";
	echo $displayArr[12] . " " . $displayArr[13] . " " . $displayArr[14] . " " . $displayArr[15] . " " . "\n";

	
	echo "enter first index (0-15):";
	if (($input = trim(fgets(STDIN, 1024))) === "bye")
				{
					echo "your final score is: $cnt\n";
					echo "See you next time!\n";
					break;
				}

	$i1 = $input;

	echo "enter second index (0-15):";
	if (($input = trim(fgets(STDIN, 1024))) === "bye")
				{
					echo "your final score is: $cnt\n";
					echo "See you next time!\n";
					break;
				}

	$i2 = $input;

	// turn the cards of the two input indexes
	$displayArr[$i1] = $memoryArr[$i1];
	$displayArr[$i2] = $memoryArr[$i2];

	// print the back of the memory card deck + front of the input indexes; 
	echo $displayArr[0]  . " " . $displayArr[1]  . " " . $displayArr[2]  . " " . $displayArr[3]  . " " . "\n";
	echo $displayArr[4]  . " " . $displayArr[5]  . " " . $displayArr[6]  . " " . $displayArr[7]  . " " . "\n";
	echo $displayArr[8]  . " " . $displayArr[9]  . " " . $displayArr[10] . " " . $displayArr[11] . " " . "\n";
	echo $displayArr[12] . " " . $displayArr[13] . " " . $displayArr[14] . " " . $displayArr[15] . " " . "\n";

	if ( ! ( $memoryArr[$i1] == $memoryArr[$i2] ) )
	{
		echo "sorry, not a match. Enter \"ok\" to continue\n";
		
		// confirm to continue to the next round
		if (($input = trim(fgets(STDIN, 1024))) === "bye")
				{
					echo "your final score is: $cnt\n";
					echo "See you next time!\n";
					break;
				}
				
		// clear the showed cards from previous round and continue to the next round
		if ( $input == "ok"){
			for ($i = 0; $i<15; $i++)
			{
				echo "cleeeeeeeeeaaaaaaaaaaarrrrrr\n";
			}
			
			// turn the chosen cards back;
			$displayArr[$i1] = "x";
			$displayArr[$i2] = "x";
			continue;
		}		
	}

	else 
	{
		$cnt++;
		echo "it's a match! " . ( 4 - $cnt ) . " matches to go!\n";
		
		// check if the there are any cards left in the deck
		if ( $cnt == 4 ) 
		{
			echo "you win!\n";
			$cnt == 0;
			break;
		}
		else 
		{
			if (($input = trim(fgets(STDIN, 1024))) === "bye")
				{
					echo "your final score is: $cnt\n";
					echo "See you next time!\n";
					break;
				}
				
			// clear the showed cards from previous round and continue to the next round
			if ( $input == "ok")
			{
				for ($i = 0; $i<15; $i++)
				{
					echo "cleeeeeeeeeaaaaaaaaaaarrrrrr\n";
				}
			
				// remove matching cards from the deck
				$displayArr[$i1] = " ";
				$displayArr[$i2] = " ";
				continue;
			}		
		}	
	}
}
