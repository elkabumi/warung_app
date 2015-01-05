<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/menu_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("menu");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "menu.php?page=form";

		include '../views/menu/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "menu.php?page=list";
		$query_menu_type = select_menu_type();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "menu.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->menu_name = false;
			$row->menu_type_id = false;
			$row->menu_price = false;
			$row->menu_img = false;

			$action = "menu.php?page=save";
		}

		include '../views/menu/form.php';
		get_footer();
	break;

	case 'save':
	
	

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_menu_type_id = get_isset($i_menu_type_id);
		$i_price = get_isset($i_price);
		
		$path = "../img/menu/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
	

			$data = "'',
					'$i_menu_type_id', 
					'$i_name',
					'$i_price', 
					'$i_img'
			";
			
			//echo $data;

			create($data);
			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}

			header("Location: menu.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_menu_type_id = get_isset($i_menu_type_id);
		$i_price = get_isset($i_price);
		
		$path = "../img/menu/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		
			if($i_img){
				
				if($i_img){
				if(move_uploaded_file($i_img_tmp, $path.$i_img)){
					$get_img_old = get_img_old($id);
					if($get_img_old){
						unlink("../img/menu/" . $get_img_old);
					}
					
					$data = " menu_name = '$i_name', 
							menu_type_id = '$i_menu_type_id',
							menu_price = '$i_price',
							menu_img = '$i_img'

					";
				}
			}
			
			}else{
				$data = " menu_name = '$i_name', 
							menu_type_id = '$i_menu_type_id',
							menu_price = '$i_price'
					";
			}

			
			update($data, $id);
			
			header('Location: menu.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	
		$get_img_old = get_img_old($id);
					if($get_img_old){
						unlink("../img/menu/" . $get_img_old);
					}
		delete($id);

		header('Location: menu.php?page=list&did=3');

	break;
}

?>