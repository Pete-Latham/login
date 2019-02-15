<?php

for ($I = 1; $I <= 1000; $i++){
    echo '$I<br />';
}

while($x < 31){
    echo 'Today is the '.$x.'th of June<br/>';
}

echo 'Apple'."<br />";
echo 'Pear',"<br />";
echo "Banana".'<br />' // more fruit ;


if (1==1){
    echo "Maths appears to be working<br />';

    if (2==2){
        echo 'Maths still appears to be working<br />';
    }else{
        echo 'Oh no! Maths is broken!';

}

if (3==3)
    echo 'Yep, maths is still working<br />';

$query = "SELECT FROM users WHERE first_name = 'Oli' AND last_name = 'Ward";
$result = mysqli_query(query);
