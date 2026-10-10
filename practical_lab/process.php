<?php

$firstkwh = "";
$error = "";
$showBill = false;

//$_POST tarik data direct dari form
    if (isset($_POST['calculate'])) {
    //. (titik atau dot) untuk gabungkan string dengan PHP dan HTML
    //echo (print output / paparkan data)
    // echo "<p>The input for the first kWh is " . $_POST['first'] . "</p>";# code...

    // variable declaration
    $firskwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];

    // echo "<p>The charge for the first kWh is " . $charge1 . "</p>";
    // first validation
    // will check if user did not enter any value, then the charge will be 0
    if ($firskwh == "") {
        $firskwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }

    //second validation
    if ($firskwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Please enter a valid value (0 or more).";
    }

    //third validation
    //
    else if ($firskwh > 200) {
        $error = "Please enter a valid value (0-200).";
    }
    else if ($secondkwh > 100) {
        $error = "Please enter a valid value (0-100).";
    }
    else if ($thirdkwh > 300) {
        $error = "Please enter a valid value (0-300).";
    }
    else if ($fourthkwh > 300) {
        $error = "Please enter a valid value (0-300).";
    }
    else if ($fifthkwh > 0) {
        $error = "Please enter a valid value (0 or more).";
    }
    
    //fourth validation
    else if ($firskwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter a valid value (0 or more).";
    } else {

     // $charge1 = $_POST['first'] * 0.218;
    $charge1 = $firskwh * 0.218;
    $charge2 = $secondkwh * 0.344;
    $charge3 = $thirdkwh * 0.516;
    $charge4 = $fourthkwh * 0.546;
    $charge5 = $fifthkwh * 0.571;
    
    //total kWh and total charge calculation
    $totalkwh = $firskwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    $totalcharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    if ($totalcharge < 3) {
        $totalcharge = 3;
    }

    if ($totalkwh > 0) {
        $totalSst = $totalcharge * 1.06;
        $totalcharge = $totalcharge + $totalSst;
        
    }

    $showBill = true;
    }
}
?>