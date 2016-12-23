<?php
require_once "config.php";

function getRows(){
	$res = array();
	$query = 'SELECT * FROM users';
	$rows = mysql_query($query);
	while ($row = mysql_fetch_object($rows)) {
		$res[] = $row;
	}
	return $res;
}

function getPosts()
{
	$posts = array();
	$posts[0] = $_REQUEST['id'];
	$posts[1] = $_REQUEST['fname'];
	$posts[2] = $_REQUEST['sname'];
	$posts[3] = $_REQUEST['email'];
	return $posts;
}


if (isset($_REQUEST["op"])){
	$op = $_REQUEST["op"];
	switch ($op) {
		case "create":
		$data = getPosts();
		$insert_Query = "INSERT INTO users (fname, sname, email) VALUES ('$data[1]','$data[2]','$data[3]')";
		mysql_query($insert_Query);
		header("Location: index.php");
		break;

		case "update":
		$data = getPosts();
		$update_Query = "UPDATE users SET fname='$data[1]', sname='$data[2]', email = '$data[3]'  WHERE id = $data[0]";
		mysql_query($update_Query);
		header("Location: index.php");

		break;
		case "delete":
		$data = getPosts();
		$delete_Query = "DELETE FROM users WHERE id = $data[0]";
		mysql_query($delete_Query);
		header("Location: index.php");
		break;
	}

}

?>