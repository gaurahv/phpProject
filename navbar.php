<?php
include 'partials.php'
?>
   <style>
    #logo{
        width: 30px;
        height: 30px;
    } 
</style>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
      <a class="navbar-brand" href="./index.php">
            <img id="logo" lt="Brand" src="./logo.png">
      </a>
  <a class="navbar-brand" href="#">BestPrice.com</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="./search.php?searchkey=Laptop">Laptops</a></li>
        <li><a href="./search.php?searchkey=Mobile">Mobiles</a></li>
        <li><a href="./search.php?searchkey=Tv">TV</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">More Categories Coming Soon</a></li>
      </ul>
    </li>
  </ul>
  <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
    <div class="form-group">
      <input id="searchkey" name="searchkey" type="text" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#">About Us</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Sign In</a></li>
        <li><a href="#">Sign Up</a></li>
        </ul>
    </li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
