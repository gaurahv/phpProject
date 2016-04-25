<?php
    function getFImageUrl($flipkartobj){
         return $flipkartobj->productBaseInfo->productAttributes->imageUrls->unknown;
    }
    function getFTitle($flipkartobj){
             return $flipkartobj->productBaseInfo->productAttributes->title;
    }
    function getFDescription($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->productDescription;
    }
    function getFMaximumRetailPrice($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->maximumRetailPrice->amount;
    }
    function getFSellingPrice($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->sellingPrice->amount;
    }
    function getFdiscountPercentage($flipkartobj){
        return  $flipkartobj->productBaseInfo->productAttributes->discountPercentage;
    }
    function getFProductUrl($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->productUrl;
    }
    function getFBrand($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->productBrand;
    }
    function getFColor($flipkartobj){
        return $flipkartobj->productBaseInfo->productAttributes->color;
    }

    function getFlipkartData($flipkartId){
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Fk-Affiliate-Id: gauravce6\r\n" .
                          "Fk-Affiliate-Token: 286dedc32a004ec2866d463b2ada1401\r\n"
            )
        );
        $context = stream_context_create($opts);
        $url = 'https://affiliate-api.flipkart.net/affiliate/product/json?id=' . $flipkartId;
        try{
            $json = file_get_contents($url, false, $context);
        }catch(Exception  $e){
                   
        }
        $flipkartobj = json_decode($json);
        return $flipkartobj;
    }
    function showFlipkartData($flipkartId){
        echo '<img src="' . getFImageUrl($flipkartobj) . ' "  style="width:200px;height:150px">';
        echo "<br>";echo "<br>";
        echo '<a href="' . getFProductUrl($flipkartobj) . ' ">Flipkart Link</a>';echo "<br>";
        echo "<br>";
        echo '<h1>"' . getFTitle($flipkartobj) . ' "</h1>';
        echo '<p>Description : ' . getFDescription($flipkartobj) . ' </p>';
        echo '<h4>Maximum Retail Price : ' . getFMaximumRetailPrice($flipkartobj) . ' </h4>';
        echo '<h4>Selling Price : ' . getFSellingPrice($flipkartobj) . ' </h4>';
        echo '<h4>Brand : ' . getFBrand($flipkartobj) . ' </h4>';
        echo '<h4>Color : ' . getFColor($flipkartobj) . ' </h4>';
        echo '<h4>Discount : ' .getFdiscountPercentage($flipkartobj) . '% </h4>';
    }
?>