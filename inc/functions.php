<?php

// PHP - Random Quote Generator

// Create the Multidimensional array of quote elements and name it quotes
// Each inner array element should be an associative array

// We create a multidimensional array 'quotes' and add each quote as inner array. 
/* quotes from https://www.englishtrackers.com/english-blog/famous-literary-quotes/ */

$quotes = [];

$quotes[] = array(
  'quote' => "It is a far, far better thing that I do, than I have ever done; it is a far, far better rest I go to than I have ever known.",
  'source' => 'Charles Dickens',
  'citation' => 'A Tale of Two Cities',
  'year'  => 1859,
  'more info' => 'https://en.wikipedia.org/wiki/A_Tale_of_Two_Cities',
  'tags' => ['literature', 'English'],
);


$quotes[] = array(
  'quote' => "All we have to decide is what to do with the time that is given us.",
  'source' => "J.R.R. Tolkein",
  'citation' => "The Fellowship of the Ring",
  'year'  => 1954,
  'more info' => 'https://en.wikipedia.org/wiki/The_Fellowship_of_the_Ring',
  'tags' => ['literature', 'English', 'fantasy']
);

$quotes[] = array(
  'quote' => "You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose. You’re on your own.",
  'source' => 'Dr Seuss',
  'citation' => "Oh, the Places You’ll Go!",
  'year'  => 1990,
  'more info' => 'https://en.wikipedia.org/wiki/Oh,_the_Places_You%27ll_Go!',
  'tags' => ['literature', 'English'],
);

$quotes[] = array(
  'quote' => "It matters not what someone is born, but what they grow to be.",
  'source' => 'J.K. Rowling',
  'citation' => "Harry Potter and the Goblet of Fire",
  'year'  => 2000,
  'more info' => 'https://en.wikipedia.org/wiki/Harry_Potter_and_the_Goblet_of_Fire',
  'tags' => ['literature', 'English', 'fantasy', 'young'],
);
  
$quotes[] = array(
  'quote' => "But I, being poor, have only my dreams;<br />I have spread my dreams under your feet;<br />Tread softly because (...)",
  'source' => 'W.B. Yeats',
  'citation' => 'He Wishes for the Cloths of Heaven',
  'year'  => 1899,
  'more info' => 'https://en.wikipedia.org/wiki/Aedh_Wishes_for_the_Cloths_of_Heaven',
  'tags' => ['literature', 'English', 'poetry'],
);

$quotes[] = array(
  'quote' => "Whatever our souls are made of, his and mine are the same.",
  'source' => 'Emily Bronte',
  'citation' => 'Wuthering Heights',
  'year'  => 1847,
  'more info' => 'https://en.wikipedia.org/wiki/Wuthering_Heights',
  'tags' => ['literature', 'English', 'novel'],
);

$quotes[] = array(
  'quote' => "But soft! What light through yonder window breaks?<br />It is the east, and Juliet is the sun.",
  'source' => 'William Shakespeare',
  'citation' => 'Romeo and Juliet',
  'year'  => 1597,
  'more info' => 'https://en.wikipedia.org/wiki/Romeo_and_Juliet',
  'tags' => ['literature', 'English', 'teather'],
);

$quotes[] = array(
  'quote' => "Made weak by time and fate, but strong in will<br />To strive, to seek, to find, and not to yield.",
  'source' => 'Alfred Lord Tennyson',
  'citation' => 'Ulysses',
  'year'  => 1904,
  'more info' => 'https://en.wikipedia.org/wiki/Ulysses_(poem)',
  'tags' => ['literature', 'English', 'poetry'],
);

$quotes[] = array(
  'quote' => "Whenever you feel like criticizing anyone … just remember that all the people in this world haven’t had the advantages that you’ve had.",
  'source' => 'F. Scott Fitzgerald',
  'citation' => 'The Great Gatsby',
  'year'  => 1925,
  'more info' => 'https://en.wikipedia.org/wiki/The_Great_Gatsby',
  'tags' => ['literature', 'English', 'novel'],
);

$quotes[] = array(
  'quote' => "Real courage is when you know you’re licked before you begin, but you begin anyway and see it through no matter what.",
  'source' => 'Harper Lee',
  'citation' => 'To Kill a Mockingbird',
  'year'  => 1960,
  'more info' => 'https://en.wikipedia.org/wiki/To_Kill_a_Mockingbird',
  'tags' => ['literature', 'English', 'novel'],
);


// Create the getRandomQuuote function and name it getRandomQuote
/* 
getRandomQuuote() has one argument that is used to return one quote from 'quotes' using a random number as index.
$num get a random number between 0 and the length of the $array. count starts at 1, so we need -1.
*/

function getRandomQuuote($array){
  $num = rand(0, count($array)-1);
  return $array[$num];
}

/*
printQuote() has one argument that it uses to call getRandomQuuote. In this case, it sends 'quotes' in order to get one random quote.
With that quoute the function creates a string with the HTML needed in index.php
Each step validates that the array has a value for the associated key.
*/

function printQuote($array){
  $array = getRandomQuuote($array);
   $string_html = " ";
  if(isset($array['quote'])){
    $string_html = '<p class="quote">' . $array['quote'];
  }
  if(isset($array['source'])){
    $string_html = $string_html . '<p class="source">' . $array['source'];
  }
  if(isset($array['citation'])){
    $string_html = $string_html . '<span class="citation">' . $array['citation'] . '</span>';
  }
  if(isset($array['year'])){
    $string_html = $string_html . '<span class="year">' . $array['year'] . '</span>';
  }
  if(isset($array['tags'])){
    $string_html = $string_html . '<br />';
    foreach($array['tags'] as $key => $tag){
        $string_html = $string_html . '<span> #' . $tag . '</span>';
      }
  }
  if(isset($array['quote'])){
    $string_html = $string_html . '<span class="year"><a href="' . $array['more info'] . '">More info.</a></span>';
  }
  if(isset($array['quote'])){
    $string_html = $string_html . '</p>';
  }
  return $string_html;
}

/*
change_bgcolor() creates de property 'style="background-color:' for <body> tag in index.php
We use $colors and pick one of them up randomly every time index.php is loaded.
*/

function change_bgcolor(){
  //from https://clrs.cc/
  $colors = array('#001f3f', '#0074D9', '#7FDBFF', '#39CCCC', '#3D9970', '#2ECC40', '#01FF70', '#FFDC00', '#FF851B', '#FF4136', '#85144b', '#F012BE', '#B10DC9', '#AAAAAA', '#DDDDDD');
  $num = rand(0, count($colors)-1);
  $string_html = ' style="background-color:';
  $string_html = $string_html . $colors[$num];
  $string_html = $string_html . ';';
  return $string_html;
}


?>