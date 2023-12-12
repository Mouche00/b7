<?php

    require_once("../app/models/agency.php");
    require_once("../app/models/address.php");

    $agency = new Agency();
    $address = new Address();

    // $agency->edit("1", "333", "222", "94774918965746bcd77a535.31567280");
    $currentagency = $agency->search(1);
    $currentAddressId = $currentagency['address_id'];

    echo $currentAddressId;

    $address->edit($currentAddressId, "city", "district", "street", 1111, "$email@ff.co", 111111);

?>