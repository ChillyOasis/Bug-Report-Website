<?php

$HOST = "localhost";
$USERNAME = 'root';
$PASSWORD = '';
$DB = 'csit314';
$link = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB) or die(mysqli_connect_error());