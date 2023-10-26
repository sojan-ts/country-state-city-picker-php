<!DOCTYPE html>
<html lang="en">
<head>
    <title>Country-State-City - Sojan Sir</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>

</style>
</head>
<body>

<?php
include "config.php";
include_once "Common.php";
$common = new Common();
$allCountries = $common->getCountries($connection);
?>
    <form action="script.php" method="post">

        <label>Country <span style="color:red">*</span></label>
        <select name="country" id="countryId" class="form-control" onchange="getStatesByCountry();" >
            <option value="">Country</option>
            <?php
            if ($allCountries->num_rows > 0 ){
                while ($country = $allCountries->fetch_object() ) {
                    $countryId = $country->id;
                    $countryName = $country->name;?>
                    <option value="<?php echo $countryId;?>"><?php echo $countryName;?></option>
                <?php }
            }
            ?>

        </select>

        <label>State <span style="color:red">*</span></label>
        <select class="form-control" name="state" id="stateId" onchange="getCityByState();"  >
            <option value="">State</option>
        </select>

        <label>City <span style="color:red">*</span></label>
        <select class="form-control" name="city" id="cityDiv">
            <option value="">City</option>
        </select>

        <input type="submit" name="submit" value="Submit">
    </form>
<script>
    function getStatesByCountry() {
        var countryId = $("#countryId").val();
        $.post("ajax.php",{getStatesByCountry:'getStatesByCountry',countryId:countryId},function (response) {
           // alert(response);
            var data = response.split('^');
            var stateData = data[1];
            $("#stateId").html(stateData);
        });
    }

    function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
            // alert(response);
            var data = response.split('^');
            var cityData = data[1];
            $("#cityDiv").html(cityData);
        });
    }
</script>
</body>
</html>
