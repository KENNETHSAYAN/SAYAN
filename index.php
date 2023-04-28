<?php

$conn = mysqli_connect("localhost", "root", "", "xml_sample");

$affectedRow = 0;

$xml = simplexml_load_file("index.xml")
    or die("Error: Cannot create object");

foreach ($xml->children () as $row) {
    $employee_id = $row->employee_id;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $email = $row->email;
    $phone_number = $row->phone_number;
    $hire_date = $row->hire_date;
    $job_id = $row->job_id;
    $salary = $row->salary;

    $sql = "INSERT INTO employee(employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary) VALUES ('" . $employee_id . "','". $first_name . "','" .$last_name . "','" . $email . "','" .$phone_number . "','" .$hire_date . "','" .$job_id . "','" .$salary . "')";

    $result = mysqli_query($conn, $sql);

    if (! empty ($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}
?>
<?php
if ($affectedRow > 0) {
    $message = $affectedRow ." records inserted";
} else {
    $message = "No records inserted";
}
?>
<center><h2>INSERT XML TO MYSQL USING PHP</h2></center>
<center><h1>XML Data storing in Database</h1></center>

<style>
    body{
        max-width:550px;
        font-family: arial;
        text-align:center;
        padding-left: 350px;
    }

    .affected_row{
        border: #bdd6bd 1px solid;
        border-radius: 2px;
        background: #cae4ca;
        padding: 20px;
        margin-bottom: 20px;
        color: #6e716e;

    }

    .error_message{
        border: #dab2b2 1px solid;
        border-radius: 2px;
        background: #eac0c0;
        padding: 20px;
        margin-bottom: 20px;
        color: #5d5b5b;
    
    }
</style>

<div class="affected-row">
    <?php echo $message; ?>
</div>

<?php if (! empty($error_message)) { ?>

    <div class="error-message">
        <?php echo n12br($error_message); ?>
    </div>
<?php } ?>

<?php

$xml_data = simplexml_load_file("index.xml") or die ("Error: Object Creation failure");

foreach ($xml_data->children() as $data)
{
echo "employee_id : ", $data->employee_id . "<br> ";
echo "first_name : ", $data->first_name . "<br> ";
echo "last_name : ", $data->last_name . "<br> ";
echo "email : ", $data->email . "<br> ";
echo "phone_number : ", $data->phone_number . "<br> ";
echo "hire_date : ", $data->hire_date . "<br> ";
echo "hire_id : ", $data->hire_id . "<br> ";
echo "salary : ", $data->salary . "<br> ";
echo "---------------------------------------";
echo "<br>";
}
?>