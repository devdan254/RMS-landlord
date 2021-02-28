<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'DASHBOARD', 
			'icon' => '<i class="fa fa-navicon c fa-2x "></i>'
		),
		
		array(
			'path' => 'property', 
			'label' => 'PROPERTY', 
			'icon' => '<i class="fa fa-home c fa-2x"></i>',
'submenu' => array(
		array(
			'path' => 'property/index', 
			'label' => 'Properties', 
			'icon' => '<i class="fa fa-list-alt "></i>'
		),
		
		array(
			'path' => 'my_houses/index', 
			'label' => 'Units', 
			'icon' => '<i class="fa fa-windows "></i>'
		)
	)
		),
		
		array(
			'path' => 'applicant', 
			'label' => 'APPLICANT', 
			'icon' => '<i class="fa fa-adn c fa-2x"></i>'
		),
		
		array(
			'path' => 'my_tenants', 
			'label' => 'CONTACTS', 
			'icon' => '<i class="fa fa-user-plus c  fa-2x"></i>'
		),
		
		array(
			'path' => 'maintain', 
			'label' => 'MAINTENANCE', 
			'icon' => '<i class="fa fa-cogs c  fa-2x"></i>'
		),
		
		array(
			'path' => 'payment', 
			'label' => 'ACCOUNTING', 
			'icon' => '<i class="fa fa-credit-card c fa-2x text-danger"></i>',
'submenu' => array(
		array(
			'path' => 'payment/view', 
			'label' => 'Transaction', 
			'icon' => '<i class="fa fa-exchange text-success"></i>'
		),
		
		array(
			'path' => 'payment', 
			'label' => 'INVOICES', 
			'icon' => '<i class="fa fa-dollar text-warning "></i>'
		)
	)
		),
		
		array(
			'path' => 'web', 
			'label' => 'MARKETTING', 
			'icon' => '<i class="fa fa-connectdevelop c fa-2x  text-warning"  id="loading"></i>'
		),
		
		array(
			'path' => 't_maintain', 
			'label' => 'T Maintain', 
			'icon' => ''
		),
		
		array(
			'path' => 't_message_landlod', 
			'label' => 'T Message Landlod', 
			'icon' => ''
		),
		
		array(
			'path' => 't_notify', 
			'label' => 'T Notify', 
			'icon' => ''
		),
		
		array(
			'path' => 't_place', 
			'label' => 'T Place', 
			'icon' => ''
		),
		
		array(
			'path' => 't_rent', 
			'label' => 'T Rent', 
			'icon' => ''
		),
		
		array(
			'path' => 't_report', 
			'label' => 'T Report', 
			'icon' => ''
		),
		
		
		
		array(
			'path' => 'findhome', 
			'label' => 'Findhome', 
			'icon' => ''
		)
	);
		
			public static $navbartopleft = array(
		array(
			'path' => '', 
			'label' => '', 
			'icon' => '<i class="fa fa-bell-o fa-2x "><span class="w3-badge w3-red bdg w3-large">1</span></i>'
		),
		
		array(
			'path' => '', 
			'label' => '', 
			'icon' => '<i class="fa fa-calendar fa-2x"></i>'
		)
	);
		
			public static $navbartopright = array(
		array(
			'path' => '', 
			'label' => '', 
			'icon' => '<i class="fa fa-book fa-2x"></i>'
		)
	);
		
	
	
			public static $occupation = array(
		array(
			"value" => "Occupied", 
			"label" => "Occupied", 
		),
		array(
			"value" => "Empty", 
			"label" => "Empty", 
		),);
		
			public static $beds = array(
		array(
			"value" => "studio", 
			"label" => "Studio", 
		),
		array(
			"value" => "1", 
			"label" => "1", 
		),
		array(
			"value" => "2", 
			"label" => "2", 
		),
		array(
			"value" => "3", 
			"label" => "3", 
		),
		array(
			"value" => "4", 
			"label" => "4", 
		),
		array(
			"value" => "5+", 
			"label" => "5+", 
		),);
		
			public static $baths = array(
		array(
			"value" => "1", 
			"label" => "1", 
		),
		array(
			"value" => "2", 
			"label" => "2", 
		),
		array(
			"value" => "3", 
			"label" => "3", 
		),
		array(
			"value" => "4", 
			"label" => "4", 
		),
		array(
			"value" => "5+", 
			"label" => "5+", 
		),);
		
			public static $rent_type = array(
		array(
			"value" => "apartment", 
			"label" => "Apartment", 
		),
		array(
			"value" => "commercial", 
			"label" => "Commercial", 
		),
		array(
			"value" => "condo", 
			"label" => "Condo", 
		),
		array(
			"value" => "duplex", 
			"label" => "Duplex", 
		),
		array(
			"value" => "fourplex", 
			"label" => "Fourplex", 
		),
		array(
			"value" => "mobilehome", 
			"label" => "Mobilehome", 
		),
		array(
			"value" => "parking space", 
			"label" => "Parking Space", 
		),
		array(
			"value" => "room", 
			"label" => "Room", 
		),
		array(
			"value" => "storage", 
			"label" => "Storage", 
		),
		array(
			"value" => "suite", 
			"label" => "Suite", 
		),
		array(
			"value" => "Townhouse", 
			"label" => "Town House", 
		),
		array(
			"value" => "triplex", 
			"label" => "Triplex", 
		),
		array(
			"value" => "villa", 
			"label" => "Villa", 
		),);
		
			public static $sex = array(
		array(
			"value" => "Male", 
			"label" => "Male", 
		),
		array(
			"value" => "Female", 
			"label" => "Female", 
		),);
		
			public static $role = array(
		array(
			"value" => "Landlord", 
			"label" => "Landlord", 
		),);
		
}