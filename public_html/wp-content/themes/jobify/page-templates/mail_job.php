<?php 
/*
*  Template Name: Job Mail
*/
?>

<?php 

$job_id = $_POST['job_id'];
$user = $_POST['user'];
$field = get_field('viewed', $job_id);
$field = $field . ',' . $user;
$field_array = explode(",",$field);
$count = count($field_array);
if($count >= 10){
	update_field('field_54dd1b4bcd27f', $user, $job_id);
	//mail
}
else{
	update_field('field_54dd1b4bcd27f', $field, $job_id);
}


echo $field . '...' . $count;

?>
