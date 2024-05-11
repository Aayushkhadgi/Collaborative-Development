<?php
require_once './config/config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $number = filter_input(INPUT_POST, 'number');
    $birthdate = filter_input(INPUT_POST, 'birthdate');
    $gender = filter_input(INPUT_POST, 'gender');
    $streetaddress = filter_input(INPUT_POST, 'street-address');
    $streetaddress2 = filter_input(INPUT_POST, 'street-address-2');
    $country = filter_input(INPUT_POST, 'country');
    $city = filter_input(INPUT_POST, 'city');
    $region = filter_input(INPUT_POST, 'region');
    $postalcode = filter_input(INPUT_POST, 'postal-code');

    $db = getDbInstance();
    $sql = "INSERT INTO userregistrations (fullname, email, number, birthdate, gender, street_address, street_address_2, country, city, region, postal_code) VALUES ('$fullname', '$email', '$number', '$birthdate', '$gender', '$streetaddress', '$streetaddress2', '$country', '$city', '$region', '$postalcode')";

    // Execute the query
    $result = $db->query($sql);
    header('location: ../Trek Management System/Trek.html');
}
