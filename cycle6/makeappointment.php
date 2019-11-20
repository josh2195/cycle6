<?php
$pagetitle = "Josh's Pharmacy";
include_once "head.php";

//Set Variables
$showform = 1;
$errormsg = 0;
$errappdate = "";
$errlastname = "";
$numofchoices = 0;

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //Sanitize data
    $formstuff['appdate'] = trim($_POST['appdate']);
    $formstuff['lastname'] = trim($_POST['lastname']);

    //Make sure field is not empty
    if(empty($formstuff['appdate'])) {$errappdate = "Cannot be left empty!"; $errormsg = 1;}
    if(empty($formstuff['lastname'])) {$errlastname = "Cannot be left empty!"; $errormsg = 1;}

    //Error handling
    if($errormsg == 1){
        echo "<p> There are errors. Please fix them. </p>";
    }
    else{
        //Insert option into the database
        try{
            $sql = "INSERT into appointments (appdate, lastname) VALUES (:appdate, :lastname)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':appdate', $formstuff['appdate']);
            $stmt->bindValue(':lastname', $formstuff['lastname']);
            $stmt->execute();

            echo "<p class='awesome'> Thank you. </p>";
        }
        catch (PDOException $e){
            die ($e ->getMessage());
        }
    }
}
if($showform == 1) {
    ?>
    <form name="appointment" id="appointment" method="post" action="makeappointment.php">
        <table>
            <tr>
                <th><label for="appdate">Choose  a date:</label><span class="important">*</span></th>
                <td><input type="date" name="appdate" id="appdate" type="text" size="20"/>
                    <span class="error"><?php if (isset($errappdate)) {
                            echo $errappdate;
                        } ?></span></td>
            </tr>
            <tr>
                <th><label for="lastname">Lastname:</label><span class="important">*</span></th>
                <td><input name="lastname" id="lastname" type="text" size="20"/>
                    <span class="error"><?php if (isset($errlastname)) {
                            echo $errlastname;
                        } ?></span></td>
            </tr>
        </table>
        <input type="submit" name="submit" id="submit" value="Submit"/> <br />

    </form>
    <?php
}
include_once "foot.php";
?>