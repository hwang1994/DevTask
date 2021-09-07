<?php
include('Race.php');
include('Car.php');
include('Track.php');
include('RoundResult.php');
include('RaceResult.php');

// run a race and print the results
 $test = new Race;
 $results = $test->runRace();
 print_r($results->getRoundResults());

 //comment/uncomment this to see/hide the winners
//  for ($i = 0; $i < $test->getNumberOfCars(); $i++)
//  {
//     if ($results->getRoundResults()[count($results->getRoundResults())-1]->getCarsPosition()[$i] >= $test->getTrack()->getTotalElements()-1)
//     {
//         print_r("car # ".($i+1)." is a winner".PHP_EOL);
//     }
//  }

