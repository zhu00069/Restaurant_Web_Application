
 <!DOCTYPE html>
    <head>
        <title>WP Eatery - Contact Us</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Fugaz+One|Muli|Open+Sans:400,700,800' rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <img src="images/header_img.jpg" alt="Dining Room" title="WP Eatery"/>
                <div id="title">
                    <h1>WP Eatery</h1>
                    <h2>1385 Woodroffe Ave, Ottawa ON</h2>
                    <h2>Tel: (613)727-4723</h2>
                </div>
            </header>
            <nav>
                <div id="menuItems">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
		    </nav>
				<?php
				
				 class menuItems{
					private $itemName;
					private $description;
					private $price;
					
					function __construct($itemName, $description, $price){
						$this->setItemName($itemName);
						$this->setDescription($description);
						$this->setPrice($price);                     }
						
									
					public function getItemName( ){
						return $this->itemName;	 }
						
					public function setItemName($itemName){
						$this->itemName = $itemName;}
						
					public function getDescription(){
						return  $this->description; }
					
					public function setDescription($description){
						 $this->description=$description;}
					
					
					public function getPrice(){
						return  $this->price; }
						
					public function setPrice($price){
						$this->price=$price;  }
				 }
				
			    ?>	
				
		