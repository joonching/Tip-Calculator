<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
		<title>Tip Calculator</title>
		<link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="input_fields">
            <header><h1>Tip Calculator</h1></header>
            <form method="post" action="">
                <p class="bill_subtotal">Bill subtotal: $
                <?php
                    if(isset($_POST['submit'])){
                        $bill_val = $_POST['bill'];
                    }
                    else {
                        $bill_val = "";
                    }
                    echo '<input class="tBox" type="text" name="bill" value="' . $bill_val . '" placeholder="0" autocomplete="off">';
                    
                ?></p>
                <p class="tip_percent">Tip Percentage:</p>
                <?php
                    if(isset($_POST['submit'])){
//                        if($_POST['tip'] == "on"){
//                            $tip = -1;
//                        }
//                        else{
//                            
//                        }
                        $tip = $_POST['tip'];
                    }
                    else {
                        $tip = '0.1';
                    }
                    for($tip_val = 10; $tip_val <= 20; $tip_val += 5){
                        if(($tip*100) == $tip_val) {
                            echo '<input type="radio" name="tip" value="' .($tip_val/100). '" checked="checked">' .$tip_val. '%';
                        }
                        else {
                            echo '<input type="radio" name="tip" value="' .($tip_val/100). '">' .$tip_val. '%';
                        }
                    }
                ?>
               <p><input class="submit" type="submit" name="submit"></p>
            </form>
            <p class="result">
            <?php
                if(isset($_POST['submit']) && is_numeric($_POST['bill']) && $_POST['bill'] > 0) {
                    $print_tip = $_POST['tip'];
                    $print_bill = $_POST['bill'];
                    echo '<p><text area readonly class="box">Tip: $'.(($print_bill * $print_tip)).'</p>';
                    echo '<p><text area readonly class="box">Total: $'.($print_bill + ($print_bill * $print_tip)).'</p>';
                }
            ?></p>
        </div>
    </body>
</html>