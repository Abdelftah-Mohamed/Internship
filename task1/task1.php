<?php
 // variables in php 
 // the varible must proceed by $ sign 
 $var1 = 15 ;
 $var2 = "ahmed";
 $var3 = 'a' ;
 $var4 = 15.77777;
 echo "<h1>" . $var1 .' '.$var2 . ' ' .$var3 . ' ' .  $var4 . ' ' . "</h1>" ;    
 // if in php 
 /*
 if (condition)
  executed any thing 
else 

 */   
if ($var1 == 15 )
echo "<h1>" . "correct value "  . "</h1>" ;
else 
echo "incorrect value " ;
   
// loop in php 
// for loop 
for ($i = 1 ; $i <= 10 ; $i++)
echo $i . ' ' ;
 
echo "<br>";
// while loop 
$h = 1 ;
while ($h<=10)
{
    echo $h . ' ';
    $h++; 
}

echo "<br>";

// do while 
$o = 1 ; 
do 
{
    echo $o . ' ' ;
    $o++;
} while ($o<=10) ;
 
echo "<br>";
echo "<br>";
echo "<br>";

// funcation 
/*
funcation funcation_name (parameter)
{
code 
return statment 
}
*/

function print_name ($name){
    return "hello " .$name ;
}
echo print_name("abdo");


echo "<br>";
echo "<br>";
echo "<br>";

//  arrays 
// $Array_Name  = array(values)

$data = array(1,2,3,4,5);
foreach ($data as  $x)
echo $x . " " ;

echo "<br>";
?>
