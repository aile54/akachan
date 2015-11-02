<!--    Chuỗi khai báo lấy tham số của google maps   -->
<script type="text/javascript" 
		src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi">
</script>
<div id="div_id" style="height:400px; width:700px; margin-left:40px; border:groove #CCC" align="center" >
LOADING...
<script type="text/javascript">
  var map;
  function initialize() {
		var myLatlng = new google.maps.LatLng(10.802218,106.691076);
		var myOptions = {
	  zoom: 16,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
	// Biến text chứa nội dung sẽ được hiển thị
  var text;
  text= "<b style='color:#00F; text-align:center'>" + 
	   "<img src='<?php echo $result_logo?>' width='100px'/> 172 Trần Kế Xương, P.7, Q.Phú Nhuận, Tp.HCM </b> </b>";
	 var infowindow = new google.maps.InfoWindow(
	  { content: text,
		  size: new google.maps.Size(100,50),
		  position: myLatlng
	  });
		 infowindow.open(map);    
	  var marker = new google.maps.Marker({
		position: myLatlng, 
		map: map,
		title:"abc"
	});
  }
</script>
<!--<body onLoad="initialize()"> de hien thi -->  
</div>