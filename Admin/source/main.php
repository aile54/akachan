<?php
	if(isset($_GET["choose"])){
			$choose = $_GET["choose"];
		}else $choose = '';
switch($choose){
	
	// components img
	case 'img': include('components/img/img.php'); break;
	case 'addimg': include('components/img/add.php');break;
	case 'editimg': include('components/img/edit.php');break;
	
	// components news
	case 'news': include('components/news/news.php'); break;
	case 'addnews': include('components/news/add.php');break;
	case 'editnews': include('components/news/edit.php');break;
	
	// component creat components
	case 'view_com': include('source/creat_component/view.php');break;
	case 'edit_com': include('source/creat_component/edit.php');break;
	
	// binhluan
	case 'binhluan': include('components/binhluan/binhluan.php'); break;
	case 'viewbinhluan': include('components/binhluan/view.php'); break;
	
	// component baiviet
	case 'baiviet': include('components/baiviet/baiviet.php'); break;
	case 'addbaiviet': include('components/baiviet/add.php'); break;
	case 'editbaiviet': include('components/baiviet/edit.php'); break;
	
	// component category_bv
	case 'category_bv': include('components/category_bv/category_bv.php'); break;
	case 'addcategory_bv': include('components/category_bv/add.php'); break;
	case 'editcategory_bv': include('components/category_bv/edit.php'); break;
	
	// component tabprice
	case 'tabprice': include('components/tabprice/tabprice.php'); break;
	case 'addprice': include('components/tabprice/add.php'); break;
	case 'editprice': include('components/tabprice/edit.php'); break;
	
	// component chuyenmuc
	case 'chuyenmuc': include('components/chuyenmuc/chuyenmuc.php'); break;
	case 'addchuyenmuc': include('components/chuyenmuc/add.php'); break;
	case 'editchuyenmuc': include('components/chuyenmuc/edit.php'); break;
	
	// component nsx
	case 'nsx': include('components/nsx/nsx.php'); break;
	case 'addnsx': include('components/nsx/add.php'); break;
	case 'editnsx': include('components/nsx/edit.php'); break;
		
	// component linkweb
	case 'linkweb': include('components/linkweb/linkweb.php'); break;
	case 'addlinkweb': include('components/linkweb/add.php'); break;
	case 'editlinkweb': include('components/linkweb/edit.php'); break;
	
	// component products_thanhly
	case 'products1': include('components/products/products_thanhly.php');break;
	// component products_nuocngoai
	case 'products2': include('components/products/products_nuocngoai.php');break;
	
	// component category3
	case 'category3': include('components/category3/category.php'); break;
	case 'addCategory3': include('components/category3/add.php'); break;
	case 'editCategory3': include('components/category3/edit.php'); break;
	
	// component category2
	case 'category2': include('components/category2/category.php'); break;
	case 'addCategory2': include('components/category2/add.php'); break;
	case 'editCategory2': include('components/category2/edit.php'); break;
	
	// component category1
	case 'category1': include('components/category1/category.php'); break;
	case 'addCategory1': include('components/category1/add.php'); break;
	case 'editCategory1': include('components/category1/edit.php'); break;
	
	// components shopping
	case 'shopping': include('components/shopping/shopping.php'); break;
	case 'addshopping': include('components/shopping/add.php');break;
	case 'editshopping': include('components/shopping/edit.php');break;
	
	// components poll
	case 'poll': include('components/poll/poll.php'); break;
	case 'addpoll': include('components/poll/add.php');break;
	case 'editpoll': include('components/poll/edit.php');break;
	
	// components combi
	case 'combi': include('components/combi/combi.php'); break;
	case 'addcombi': include('components/combi/add.php');break;
	case 'editcombi': include('components/combi/edit.php');break;
	
	// component products
	case 'products': include('components/products/products.php');break;
	case 'addProducts': include('components/products/add.php');break;
	case 'editProducts': include('components/products/edit.php');break;

	// category advertise
	case 'category_adv': include('components/category_adv/category.php'); break;
	case 'addcategory_adv': include('components/category_adv/add.php'); break;
	case 'editcategory_adv': include('components/category_adv/edit.php'); break;	
	
	// components advertise
	case 'advertise': include('components/advertise/advertise.php');break;
	case 'addAdvertise': include('components/advertise/add.php');break;
	case 'editAdvertise': include('components/advertise/edit.php');break;
	
	// components pages
	case 'pages': include('components/pages/pages.php'); break;
	case 'addPages': include('components/pages/add.php'); break;
	case 'editPages': include('components/pages/edit.php'); break;
	// components hotro
	case 'support': include('components/support/support.php'); break;
	case 'addsupport': include('components/support/add.php'); break;
	case 'editsupport': include('components/support/edit.php'); break;
	// contact
	case 'contact': include('components/contact/contact.php'); break;
	case 'viewContact': include('components/contact/view.php'); break;
	
	// component member
	case 'member': include('components/member/member.php'); break;
	case 'addmember': include('components/member/add.php'); break;
	case 'editmember': include('components/member/edit.php'); break;
	
	// setting
	case 'setting': include('components/setting/setting.php'); break;
	
	// account gmail
	case 'account': include('components/account/account.php'); break;
	
	// component seo
	case 'seo': include('components/seo/seo.php'); break;
	case 'addseo': include('components/seo/add.php'); break;
	case 'editseo': include('components/seo/edit.php'); break;
	
	// component key_main
	case 'key_main': include('components/key_main/key_main.php'); break;
	case 'addkey_main': include('components/key_main/add.php'); break;
	case 'editkey_main': include('components/key_main/edit.php'); break;
	
	// permission
	case 'permission': include('components/permission/permission.php'); break;
	case 'addPermission': include('components/permission/add.php'); break;
	case 'editPermission': include('components/permission/edit.php');break;
	
	// admin
	case 'admin': include('components/admin/admin.php');break;
	case 'addAdmin': include('components/admin/add.php');break;
	case 'editAdmin': include('components/admin/edit.php');break;
	
	// user
	case 'user': include('components/user/admin.php');break;
	case 'addAuser': include('components/user/add.php');break;
	case 'edituser': include('components/user/edit.php');break;
	
	// password
	case 'password': include('components/password/password.php'); break;
	
	// report
	case 'report': include('components/report/report.php');break;
	case 'ip': include('components/report/ip.php');break;
	case 'pageaddress': include('components/report/pageaddress.php');break;
	
	// orders
	case 'orders': include('components/orders/orders.php');break;
	case 'viewOrders': include('components/orders/view.php');break;
	
	// logout
	case 'logout': include('components/logout/logout.php');break;
	
	// component promotion
	case 'promotion': include('components/promotion/promotion.php'); break;
	case 'addPromotion': include('components/promotion/add.php'); break;
	case 'editPromotion': include('components/promotion/edit.php'); break;
	
	default : include('components/pages/pages.php');

}

?>