<?php


function make_event($db, $location_id, $title, $event_from, $event_to, $event_date){

	$sql = $db->prepare(' INSERT INTO events (event_title, location_id, event_from, event_to, event_date) VALUES (:event_title, :location_id, :event_from, :event_to, :event_date) ');

	$sql->bindValue(':event_title', $title, PDO::PARAM_STR);
	$sql->bindValue(':event_from', $event_from, PDO::PARAM_STR);
	$sql->bindValue(':event_to', $event_to, PDO::PARAM_STR);
	$sql->bindValue(':event_date', $event_date, PDO::PARAM_STR);
	$sql->bindValue(':location_id', $location_id, PDO::PARAM_INT);
	$sql->execute();

	return $db->lastInsertId();

}

function make_event_location ($db, $location) {
	
	$sql= $db->prepare(' INSERT INTO locations (address) VALUES (:address) '); 

	$sql->bindValue(':address', $location, PDO::PARAM_STR);
	$sql->execute();

	return $db->lastInsertId();

}


function friend_check($db, $who_with) {

	$sql = $db->prepare(' SELECT id FROM users WHERE username = :username LIMIT 1 ');

	$sql->bindValue(':username', $who_with, PDO::PARAM_STR);
	$sql->execute();
	$results = $sql->fetch();

	return $results['id'];
}

function friend_email_check($db, $email) {

	$sql = $db->prepare(' SELECT id FROM users WHERE email = :email LIMIT 1 ');

	$sql->bindValue(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	$results = $sql->fetch();

	return $results['id'];
}

function get_username ($db, $id){

	$sql = $db->prepare('SELECT username FROM users WHERE id = :id');

	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	$user_name = ucfirst($results['username']);

	return $user_name;
}

function get_friend_email ($db, $id){

	$sql = $db->prepare('SELECT email FROM users WHERE id = :id');

	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();


	return $results;
}

function check_friend_id ($db, $user_id, $friend_id){

$sql = $db->prepare('
	SELECT id
	FROM friends
	WHERE user_id = :user_id AND friend_id = :friend_id

	');

$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$sql->bindValue(':friend_id', $friend_id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();

	if ($results) {
	return true;

	} else {

	return false;
	}
}

function add_friend_id ($db, $user_id, $friend_id) {
	
	$sql= $db->prepare(' INSERT INTO friends (user_id, friend_id) VALUES (:user_id, :friend_id) '); 

	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->bindValue(':friend_id', $friend_id, PDO::PARAM_INT);
	$sql->execute();


}

function get_friend_ids ($db, $user_id) {

$sql = $db->prepare('
	SELECT friend_id
	FROM friends
	WHERE user_id = :user_id

');
$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$sql->execute();

$results = $sql->fetchAll();

return $results;

}


function make_user_event($db, $user_id, $event_id, $confirmed) {


	$sql = $db->prepare(' INSERT INTO user_events (user_id, event_id, confirmed) VALUES (:user_id, :event_id, :confirmed) ');
	
	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->bindValue(':event_id', $event_id, PDO::PARAM_INT);
	$sql->bindValue(':confirmed', $confirmed, PDO::PARAM_BOOL);
	$sql->execute();

}

function update_user_confirmation($db, $user_id, $event_id) {

	$sql = $db->prepare(' UPDATE user_events SET confirmed = 1 WHERE event_id = :event_id AND user_id = :user_id');
	
	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->bindValue(':event_id', $event_id, PDO::PARAM_INT);
	$sql->execute();
}

function check_notification($db, $user_id) {

	$sql = $db->prepare('SELECT confirmed, event_id FROM user_events WHERE user_id = :user_id');

	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetchALL();


	return $results;

}


function get_event_loc_title ($db, $event_id) {

	$sql = $db->prepare('SELECT location_id, event_title FROM events WHERE id = :event_id');

	$sql->bindValue(':event_id', $event_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();

	return $results;

}

function get_location($db, $location_id){
	
	$sql = $db->prepare('SELECT address FROM locations WHERE id = :location_id');

	$sql->bindValue(':location_id', $location_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();


	return $results;


}

function get_event_user ($db, $event_id){
	$sql = $db->prepare('SELECT user_id FROM user_events WHERE event_id = :event_id AND confirmed = 1');

	$sql->bindValue(':event_id', $event_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetchAll();

	return $results;


}


function get_event_date ($db, $event_id ) {

	$sql = $db->prepare('SELECT event_to, event_from, event_date FROM events WHERE id = :id ');

	$sql->bindValue(':id', $event_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetchAll();

	return $results;


}

?>