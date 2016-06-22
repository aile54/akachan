                                <?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	class xl_productdetail_db extends database
	{
		function getAll(){
			$id = isset($_GET['id']) ? $_GET['id'] : "";
			$_SESSION['proId']=$id;
			$result = array();
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color', 'pro.status',
								'IF(img.image IS NULL, pro.image, IF(img.image = "", pro.image, img.image)) image',
								'pro.catid3','tp.id AS tbid', 'pro.details', 'pro.huongdan',
								'tp.proid', 'tp.price AS tbprice', 'tp.size AS tbsize', 'pro.ghichu', 'pro.URL',
								'tp.`price_promo` AS tbprice_promo, pro.promo, pro.nsx as nsxID,
								 nsx.`name` as nsxName, nsx.`image` as nsxImg, pro.love as love');
			$table = array ('products AS pro 
					LEFT JOIN (SELECT id, proid, IFNULL(MAX(price), 0) AS price, price_promo, size FROM tabprice GROUP BY proid) AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`
					 LEFT JOIN nsx ON pro.`nsx` = nsx.`id`');
			$condition =  array("pro.id = $id");
			$other = array('GROUP BY tp.`proid`');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function getSize(){
			$id = isset($_GET['id']) ? $_GET['id'] : "";
			$_SESSION['proId']=$id;
			$result = array();
			$fieldName = array("price, price_promo, size as tbsize");
			$table = array("tabprice");
			$condition =  array("proid = $id");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function getSizeAjax($id, $size){
			$_SESSION['proId']=$id;
			$result = array();
			$fieldName = array("price, price_promo, size as tbsize");
			$table = array("tabprice");
			$condition =  array("proid = $id", "size = '$size'");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function getColor(){
			$id = isset($_GET['id']) ? $_GET['id'] : "";
			$_SESSION['proId']=$id;
			$result = array();
			$fieldName = array("name, image");
			$table = array("img");
			$condition =  array("proid = $id");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
	}
	
	if(!empty($_POST['id']))
	{
		$size = $_POST['size'];
		$proid = $_POST['id'];
		if($size != null)
		{
			$list_product = new xl_productdetail_db();
			$resultSizeAjax = array();
			$resultSizeAjax = $list_product->getSizeAjax($proid, $size);
			echo json_encode($resultSizeAjax);
		}
	}
	else
	{
		$list_product = new xl_productdetail_db();
		$result = array();
		$result = $list_product->getAll();
		$resultSize = array();
		$resultSize = $list_product->getSize();
		$resultColor = array();
		$resultColor = $list_product->getColor();
	}
?>
                            