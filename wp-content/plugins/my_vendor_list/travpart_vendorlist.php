<?php
/**
* Plugin Name: Travpart Vendor List 
* Version:     1.0
* Author:      Silky
* Description: Travpart Vendor List and Bid Price Settings 
*/


require_once(__DIR__.'/simplexlsx.class.php');
register_activation_hook( __FILE__, 'travpart_vendor_activate' );

function travpart_vendor_activate() {

}

/***************************** show the subscribe in admin page  ******************************/

add_action('admin_menu', 'add_travpart_vendor_admin_menu');
add_action('admin_init', 'add_travpart_vendor_admin_menu_init');

function add_travpart_vendor_admin_menu(){
	add_options_page( 'Travpart Vendor', 'Travpart Vendor', 'manage_options', __FILE__, 'show_travpart_vendor' );
}

function add_travpart_vendor_admin_menu_init(){

}

function my_assets() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'datatables', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', array( 'jquery' ) );
    wp_enqueue_style( 'datatables-style', '//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' );

    // for export 
    wp_enqueue_script( 'datatablesexport', 'https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js', array( 'jquery' ) );
    wp_enqueue_style( 'datatables-styleexport', 'https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css' );   
}

function show_travpart_vendor(){
    my_assets();
	wp_enqueue_media();
	?>
    <h2>Travparts Vendor list & Bid Price Setting </h2>
    <form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="POST">
        <?php

		if(isset($_POST['import']))
		{
			if($xlsx=SimpleXLSX::parse($_FILES['import_file_upload']['tmp_name']))
				{
					$xlsx_data=$xlsx->rows();
					// echo "<pre>";
					// print_r($xlsx_data);
					// echo "</pre>";
					// die();

					$name_index = 1;
					$cp_name_index = 2;
					$mobile_index= 3;
					$email_index = 4;
					$location_index = 5;

						
						if($_POST['import_type']=='append'){
							$TravpartVendor = unserialize(get_option('_cs_travpart_vendorlist'));
						}else if($_POST['import_type']=='replace'){
							$TravpartVendor = array();
						}
							
							$i=0;
							
							foreach($xlsx_data as $t)
							{
								if(!empty($t[$name_index]) && $i>1)
								{
									// echo 'Name:'.$t[$name_index]."<br/>";
									// echo 'CP:'.$t[$cp_name_index]."<br/>";
									// echo 'mobile:'.$t[$mobile_index]."<br/>";
									// echo 'email:'.$t[$email_index]."<br/>";
									// echo 'Location:'.$t[$location_index]."<br/>";


									

									$find=false;
									
									// foreach($TravpartVendor as &$meal)
									// {			 
									// 	if($meal['vendor']==$t[$vendor_index])
									// 	{
									// 		echo "Append subitem<br/>";
									// 		$find_subitem=false;
											
									// 		foreach($meal['subitem'] as &$ms)
									// 		{
									// 			if($ms['name']==$t[$name_index])
									// 			{
									// 				$ms['price']=$t[$price_index];
									// 				//$ms['type']=$type;
									// 				$find_subitem=true;
									// 				break;
									// 			}
									// 		}
										
									// 		if($find_subitem==false)
									// 			array_push($meal['subitem'], array('name'=>$t[$name_index],
									// 				//'type'=>$type,
									// 				'price'=>$t[$price_index],
									// 				'img'=>''
									// 			));
												
									// 			$find=true;
									// 			break;
									// 		}
									// 	}
									
									if($find==false)
									{
										// $subitem = array();
										// array_push($subitem, array('name'=>$t[$name_index],
										// 	//'type'=>$type,
										// 	'price'=>$t[$price_index],
										// 	'img'=>''
										// ));
										
										array_push($TravpartVendor,array(
											'item'=>$i-1,
											'company_name'=>$t[$name_index],
											'cp_name'=> $t[$cp_name_index],
											'mobile'=>$t[$mobile_index],
											'email'=>$t[$email_index],
											'location'=>$t[$location_index],
										));
									} 
								}

							$i++;
						}

						if(!empty($TravpartVendor)) { 
							// update_option('_cs_travcust_boat', serialize($TravpartVendor));

							// getoptionlogic start
							if(get_option('_cs_travpart_vendorlist')){
         						update_option('_cs_travpart_vendorlist', serialize($TravpartVendor));
    						}else {
      							add_option('_cs_travpart_vendorlist', serialize($TravpartVendor));
    						}

    // getoptionlogic end



						}
					}else
						{
							echo SimpleXLSX::parse_error();
			}
		}


	if(isset($_POST['merge']))
	{
		if($xlsx=SimpleXLSX::parse($_FILES['import_file_upload']['tmp_name']))
		{
			$xlsx_data=$xlsx->rows();
			// $type=$_POST['meal_subitem_type'];
			$name_index=4;
			$price_index=3;
			$area_index=5;
			$vendor_index=6;
			$details_index=7;
			$phone_index=8;
		
			if($_POST['import_type']=='append')
				$TravpartVendor=unserialize(get_option('_cs_travcust_boat'));
			else if($_POST['import_type']=='replace')
				$TravpartVendor=unserialize(get_option('_cs_travcust_boat'));
				
				$k=0;



			for($i=1;$i<=count($TravpartVendor);$i++)
			{
				foreach($xlsx_data as $t)
				{
					if(!empty($t[$name_index]) && $k>2)
						{
							if($TravpartVendor[$i-1]['vendor']==$t[$vendor_index])
							{ 
								$find_subitem=false; 


								foreach($TravpartVendor[$i-1]['subitem'] as &$ms)
								{
									if($TravpartVendor[$i-1]['subitem']['name']==$t[$name_index])
									{
										$TravpartVendor[$i-1]['subitem']['price']=$t[$price_index];
										$TravpartVendor[$i-1]['subitem']['type']=$type;
										$find_subitem=true;
										/*array_push($TravcustMeal[$i-1]['subitem'], array('name'=>$t[$name_index],
										'type'=>$type,
										'price'=>$t[$price_index],
										'img'=>$TravcustMeal[$i-1]['img']
										));*/

										//break;
									}
								}


								if(array_key_exists('item', $TravpartVendor[$i-1]))
								{
									$TravpartVendor[$i-1]['item']=$t[$details_index];
								}
								if(array_key_exists('name', $TravcustMeal[$i-1]))
								{
									$TravpartVendor[$i-1]['name']=$t[$name_index];
								}
								if(array_key_exists('price', $TravcustMeal[$i-1]))
								{
									$TravpartVendor[$i-1]['price']=$t[$price_index];
								}
								if(array_key_exists('area', $TravcustMeal[$i-1]))
								{
									$TravpartVendor[$i-1]['area']=$t[$area_index];
								}
								if(array_key_exists('phone', $TravcustMeal[$i-1]))
								{
									$TravpartVendor[$i-1]['phone']=$t[$phone_index];
								}

							$change=true;


							}
						} 
					$k++;  
			}

		if($change==true)
		{
			// break;
		}	


		}  

		if(!empty($TravpartVendor)) {/* update_option('_cs_travcust_meal2', serialize($TravcustMeal));*/ }
		}else
		{
			echo SimpleXLSX::parse_error();
		}
	}



if(isset($_POST['save']))
{
	$i=1;
	$TravpartVendor=array();
	while($i<=(int)$_POST['ea_length'])
	{
		if(!empty($_POST["ea{$i}_item"]))
		{
			$subitem=array();
			if(!empty($_POST["ea{$i}_subname"]))
			{
				for($si=0; $si<count($_POST["ea{$i}_subname"]); $si++)
				{
					if(!empty($_POST["ea{$i}_subname"][$si]))
					{
						array_push($subitem, array('name'=>$_POST["ea{$i}_subname"][$si],
													'price'=>$_POST["ea{$i}_subprice"][$si],
													'img'=>$_POST["ea{$i}_subimg"][$si]
								));
					}
				}
			}
			array_push($TravpartVendor,array('item'=>$_POST["ea{$i}_item"],
				'img'=>$_POST["ea{$i}_img"],
				'price'=>$_POST["ea{$i}_price"],
				'area'=>$_POST["ea{$i}_area"],
				'vendor'=>$_POST["ea{$i}_vendor"],
				'phone'=>$_POST["ea{$i}_phone"],
				'subitem'=>$subitem
			));
		}
	$i++;
	}

	if(!empty($TravpartVendor)) { 
		update_option('_cs_travpart_vendorlist', serialize($TravpartVendor)); 
	}
}


$TravpartVendor=unserialize(get_option('_cs_travpart_vendorlist'));

?>

<style>

td{
	text-align: center;
}
/* Style the tab */
.tab {
    float: left;
    background-color: #f1f1f1;
    width: 10%;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 85%;
    border-left: none; 
    height: 300px;
    display: none;
}

#vendor.active{
	display: block;
}
</style>

	<div class="tab">
  		<button class="tablinks" onclick="openTab(event, 'vendor')">Vendor List</button>
  		<button class="tablinks" onclick="openTab(event, 'bid')">Bid Price</button>
	</div>

<div id="vendor" class="tabcontent active">

<?php

echo '<table class="table" id="mytable1" style="border-collapse:separate;border-spacing:10px;" class="extraactivity">
		<thead>
			<tr>
				<th> Sr.No. </th>
				<th> Company Name </th>
				<th> Cp\'s Name </th>
				<th> Mobile Number </th>
				<th> Email </th>
				<th> Searved Area </th>
			</tr>
		</thead>
	<tbody>';

	for( $i=1; $i<=count($TravpartVendor); $i++ )
	{
		echo '<tr>
		<td>'.$i.'</td>
		<td>'.$TravpartVendor[$i-1]["company_name"].'</td>
		<td>'.$TravpartVendor[$i-1]["cp_name"].'</td>
		<td>'.$TravpartVendor[$i-1]["mobile"].'</td>
		<td>'.$TravpartVendor[$i-1]["email"].'</td>
		<td>'.$TravpartVendor[$i-1]["location"].'</td>
		</tr>';
	}
	echo '</tbody>
			</table>

		<input id="ea_length" name="ea_length" type="hidden" value="'.count($TravpartVendor).'"/>';
?>

</form>


    <div id="data-import-form" class="postbox">
        <form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="POST" enctype="multipart/form-data">
            <table class="tablepress-postbox-table fixed">
                <tbody>
                    <tr style="display: table-row;">
                        <th scope="row">Select file:</th>
                        <td>
                            <input name="import_file_upload" type="file" style="box-sizing: border-box;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Import Format:</th>
                        <td>
                            <select name="import[format]">
                                <option value="xlsx">XLSX - Microsoft Excel 2007-2013</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Replace, or Append?:</th>
                        <td>
                            <label for="tables-import-type-replace">
                                <input name="import_type" id="tables-import-type-replace" type="radio" value="replace"> Replace existing table</label>
                            <label for="tables-import-type-append">
                                <input name="import_type" id="tables-import-type-append" type="radio" value="append" checked="checked"> Append rows to existing table</label>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td>
                            <input type="submit" value="Import" name="import">
                        </td>
                    </tr>
                    <!-- <tr>
                        <th scope="row"></th>
                        <td>
                            <input type="submit" value="Merge" name="merge">
                        </td>
                    </tr> -->

                </tbody>
            </table>
        </form>
    </div>
</div>



	<div id="bid" class="tabcontent">
 		<table style="width:100%" style="border-collapse:separate;border-spacing:10px;border: 1px solid #ddd !important;" class="table" id="mytable2">
		 	<thead>
			<tr>
				<th> Agent's name </th>
				<th> Booking code </th>
				<th> Company Name </th>
				<th> Cp's Name </th>
				<th> Phone Number </th>
				<th> Email </th>
				<th> Total amount received from client </th>
				<th> Offered Price </th>
				<th> Paid/Unpaid </th>
			</tr>
		</thead>
		<tbody>
		
	<?php
		global $wpdb;
		$query = "SELECT * from tourfrom_balieng2.finalitinerary group by bookingcode";
    	$results = $wpdb->get_results($query);

    	foreach ( $results as $data ) {?>
			<tr>				
				<td> <?php echo 'agent name'  ?> </td>
				<td> <?php echo $data->bookingcode ?> </td>
				<td> <?php echo 'company name'  ?> </td>
				<td> <?php echo 'cp name'  ?> </td>
				<td> <?php echo 'phone'  ?> </td>
				<td> <?php echo 'email'  ?> </td>
				<td> <?php echo $data->totalpricewithdiscount  ?> </td>
				<td> <?php echo $data->vendorbid  ?> </td>
				<td>
  						<?php  
  							if($data->paidstatus==1){ 
						    	echo "<span style='color:green'> Paid </span>";
						   	}else{
						   		echo "<span style='color:blue'> Not Paid </span>" ;
						   	} 
						?>
				</td>
			</tr>
			<?php  }
	?>

		</tbody>
		</table>
	</div>

<script>
jQuery(document).ready( function () {
	jQuery('#mytable1').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'print'
        ]
	});
    jQuery('#mytable2').DataTable({
    	dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'print'
        ]
    });
});

// for tabs
function openTab(evt, tabName) {
	evt.preventDefault();
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

    <?php
}
?>
