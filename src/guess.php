<?php
/*
Overview: a guess the number game that will loop amount of times the user decides.
*/

$play_count = 0;
$correct_guesses = 0;
$guess_high = 0;
$guess_low = 0;
$rounds = 1;

echo "\nWELCOME TO NUMBER GUESSING!\n\nA game where you have to guess the random number and see how lucky you are :)\n\nEnter how many rounds you want to play:\n";

$rounds = intval(readline(">> "));

function guessNumber()
{
	global $play_count, $correct_guesses, $guess_high, $guess_low, $rounds;

	if ($rounds === 0) {
		$rounds = 10;
		echo "\nWe've picked the default ${rounds} rounds\n";
	} else {
		echo "\nYou've choosen ${rounds} rounds. Best of luck to you!\n";
	}

	echo "\nINSTRUCTIONS:\nTry to guess the number between 1 and 10.\n\n";

	while ($play_count < $rounds) {
		echo "\nRound " . ($play_count + 1) . " | Make a guess!\n-----------------------\n";

		$guess = intval(readline(">> "));
		$random = rand(1, 10);

		if ($guess >= 1 && $guess <= 10) {
			echo "\nYour guess: $guess\nCorrect answer: $random\n";
			if ($guess === $random) {
				$correct_guesses++;
			}
			if ($guess > $random) {
				$guess_high++;
			}
			if ($guess < $random) {
				$guess_low++;
			}
			$play_count++;
		} else {
			echo "\nInvalid input. Try again.\n";
		}
	}

	$percentage_guessed_correctly = ($correct_guesses / $play_count) * 100;

	if ($percentage_guessed_correctly <= 20 && $percentage_guessed_correctly > 0) {
		echo "\nNot bad! You guessed ${percentage_guessed_correctly}% correctly out of ${play_count} tries!\n";
	} elseif ($percentage_guessed_correctly > 20) {
		echo "\nWow! You guessed ${percentage_guessed_correctly}% correctly out of ${play_count} tries!\n";
	} else {
		echo "\nHmmm... you're not very lucky. You guessed ${percentage_guessed_correctly}% correctly out of ${play_count} tries.\n";
	}

	if ($guess_high > $guess_low) {
		echo "\nWhen you guessed wrong, you tended to guess high.\n\n";
	} elseif ($guess_low > $guess_high) {
		echo "\nWhen you guessed wrong, you tended to guess low.\n\n";
	}
}

guessNumber();