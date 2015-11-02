	tinyMCE.init({

		mode : "textareas",

		theme : "advanced",

		plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",

		theme_advanced_buttons1_add_before : "save,newdocument,separator",

		theme_advanced_buttons1_add : "fontselect,fontsizeselect",

		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",

		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",

		theme_advanced_buttons3_add_before : "tablecontrols,separator",

		theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		plugin_insertdate_dateFormat : "%Y-%m-%d",

		plugin_insertdate_timeFormat : "%H:%M:%S",

		extended_valid_elements : "hr[class|width|size|noshade]",

		file_browser_callback : "fileBrowserCallBack",

		paste_use_dialog : false,

		theme_advanced_resizing : true,

		theme_advanced_resize_horizontal : false,

		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",

		apply_source_formatting : true

	});



	function fileBrowserCallBack(field_name, url, type, win) {

		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";

		var enableAutoTypeSelection = true;

		

		var cType;

		tinyfck_field = field_name;

		tinyfck = win;

		

		switch (type) {

			case "image":

				cType = "Image";

				break;

			case "flash":

				cType = "Flash";

				break;

			case "file":

				cType = "File";

				break;

		}

		

		if (enableAutoTypeSelection && cType) {

			connector += "&Type=" + cType;

		}

		

		window.open(connector, "tinyfck", "modal,width=600,height=400");

	}