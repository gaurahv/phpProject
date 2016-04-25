<?php

    function getSnapdealData($snapdealid){
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Snapdeal-Affiliate-Id: 87571\r\n" .
                          "Snapdeal-Token-Id: 2f5dc25586a8b3054ff15c6d1d49c2\r\n"
            )
        );
        $context = stream_context_create($opts);
        $url='http://affiliate-feeds.snapdeal.com/feed/product?id='.$snapdealid;
        $json = file_get_contents($url, false, $context);
        $snapdealObject = json_decode($json);
        return $snapdealObject;
    }


    function getImageUrl($snapdealObject){
         return $snapdealObject->imageLink;
    }
    function getTitle($snapdealObject){
             return $snapdealObject->title;
    }
    function getDescription($snapdealObject){
        return $snapdealObject->description;
    }
    function getMaximumRetailPrice($snapdealObject){
        return $snapdealObject->mrp;
    }
    function getSellingPrice($snapdealObject){
        return $snapdealObject->offerPrice;
    }
    function getProductUrl($snapdealObject){
        return $snapdealObject->link;
    }
    function getBrand($snapdealObject){
        return $snapdealObject->brand;
    }

    function showSnapdealData($snapdealId){
        echo '<img src="' . getImageUrl($snapdealObject) . ' "  style="width:230px;height:300px">';
        echo "<br>";
        echo '<a href="' . getProductUrl($snapdealObject) . ' ">Snapdeal Link</a>';
        echo "<br>";
        echo '<h2>"' . getTitle($snapdealObject) . ' "</h2>';
        echo '<p>Description ' . getDescription($snapdealObject) . ' </p>';
        echo "<br>";
        echo '<h4>Brand : ' . getBrand($snapdealObject) . ' </h4>';
        echo '<h4>Maximum Retail Price : ' . getMaximumRetailPrice($snapdealObject)  . ' </h4>';
        echo '<h4>Selling Price : ' . getSellingPrice($snapdealObject)  . ' </h4>';
    }
?>