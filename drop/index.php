<?php
require_once("dbcontroller.php");
include("../include/connection.php");
$db_handle = new DBController();
$query ="SELECT * FROM category";
$results = $db_handle->runQuery($query);
?>
<html>
<head>
<TITLE>Quiz Dependent DropDown List </TITLE>
<head>
<style>
body{width:660px;font-family:calibri;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
.row1{padding-bottom:15px;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'category_id='+val,
	success: function(data){
		$("#course-list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getdescription(val) {
	$.ajax({
	type: "POST",
	url: "getdescription.php",
	data:'description_id='+val,
	success: function(data){
		$("#description-list").html(data);
	}
	});
}

function selectdescription(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


</head>
<body>
	<form method="post">
<div class="frmDronpDown">
<div class="row">
<label>category:</label><br/>
<select name="category" id="category-list" class="demoInputBox" onChange="getState(this.value);">
<option value="">Select category</option>
<?php
foreach($results as $category) {
?>
<option value="<?php echo $category["c_id"]; ?>"><?php echo $category["c_name"]; ?></option>
<?php
}
?>
</select>
</div>
<div class="row">
<label>course:</label><br/>
<select name="course" id="course-list" class="demoInputBox" onChange="getdescription(this.value);">
<option value="">Select course</option>
</select>
</div>
<div class="row1">
<label>description:</label><br/>
<select name="description" id="description-list" class="demoInputBox" onChange="getshow(this.value);" >
<option value="">Select description</option>
</select>


<br><br>

<input type="submit" name="submit" id="show-list" class="demoInputBox">
</div>

<?php
if (isset($_POST['submit'])) {
	
	$description=$_POST['description'];
	echo $description;

$query = mysql_query("select * from course_description where description_id='$description'") or die(mysql_error());
   $row = mysql_fetch_array($query);
  ?>

	<input type="text" value="<?php echo $row['course_name']; ?>" name="" readonly="">
	<p><?php echo $row['topic_title']; ?></p>
	<p><?php echo $row['course_content']; ?></p>
	<?php
}
?>
</div>


</form>
</body>
</html>