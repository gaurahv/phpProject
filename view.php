   <html>
    <head>
        <title>Shopping</title>
        <?php
            include 'navbar.php'        
        ?>
        <style>
            #flipkartImage{
                margin-top: 110px;
                height: 250px;
                width: 420px;
                margin-bottom: 155px;
            }
            #snapdealImage{
                padding-bottom: 0px;
                margin-bottom: 0px;
                height: 500px;
                width: 480px;
            }
            .maindiv{
                margin-bottom: 80px;
            }
        </style>
    </head>
    <body>
        <?php
            include 'connect.php';
            include 'flipkart.php';
            include 'snapdeal.php';

            $id = $_GET["id"];
            connect($id);
            $flipkartobj = getFlipkartData($flipkartId);
            $snapdealObject = getSnapdealData($snapdealId);
        ?>
           <div class="maindiv" class="container-fluid">
            <div class="row">
               <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h1 class="text-center">Flipkart</h1>
                    <img id="flipkartImage" src="<?php echo getFImageUrl($flipkartobj) ?>" alt="Flipkart Image" class="img-responsive  center-block"> 
                    <a href="<?php echo  getFProductUrl($flipkartobj) ?>">Flipkart Link</a>
                    <h2><?php echo getFTitle($flipkartobj)?></h2>
                    <h4>Maximum Retail Price : <?php  echo getFMaximumRetailPrice($flipkartobj)?> </h4>
                    <h4>Selling Price : <?php  echo getFMaximumRetailPrice($flipkartobj)?> </h4>
                    <h4>Brand : <?php  echo getFBrand($flipkartobj)?> </h4>
                    <h4>Color : <?php  echo getFColor($flipkartobj)?> </h4>
                    <h4>Discount : <?php  echo getFdiscountPercentage($flipkartobj)?> </h4>
              </div>
               
                <div class="col-md-5"> 
                    <h1 class="text-center">Snapdeal</h1>
                    <img id="snapdealImage" src="<?php echo getImageUrl($snapdealObject) ?>" alt="Flipkart Image" class="img-responsive  center-block"> 
                    <a href="<?php echo  getProductUrl($snapdealObject) ?>">Snapdeal Link</a>
                    <h2><?php echo getTitle($snapdealObject)?></h2>
                    <p><?php echo getDescription($snapdealObject)?></p>
                    <h4>Maximum Retail Price : <?php  echo getMaximumRetailPrice($snapdealObject)?> </h4>
                    <h4>Selling Price : <?php  echo getSellingPrice($snapdealObject)?> </h4>
                    <h4>Brand : <?php  echo getBrand($snapdealObject)?> </h4>
                </div>
               <div class="col-md-1"></div>

            </div>
            
        </div>
    <?php
        include 'footer.php'
        ?>
    </body>
    <script src="js/bootstrap.min.js"></script>
</html>