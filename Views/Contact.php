<?php 
	include_once('../Templates/Plugin/jcart/jcart.php');	
	if (!isset($_SESSION)) {
	  session_start();
	}
	require_once('../Admin/library/loader.php');
?>
<html><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Contact</title>
    <!-- InstanceEndEditable -->
     
    <?php
		include_once('../Controllers/shortcut_icon.php');
	?>
    <!-- Library Jquery -->
    <script src="../Templates/Scripts/dialog.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/imageover.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/jquery-1.10.2.js" type="text/javascript"></script>

    <script src="../Templates/Scripts/jquery.innerfade.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/modernizr-1.7.min.js" type="text/javascript"></script>
	<script src="../Templates/Scripts/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/jquery/jquery.rateit.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/jquery-ui-1.9.0.custom.js" type="text/javascript"></script>
    <script src="../Templates/Scripts/cycle.js"></script>
    <script src="../Templates/Scripts/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="../Templates/Plugin/share/share.min.js">
    
    </script><script type="text/javascript" src="../Templates/Plugin/scroll/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="../Templates/Plugin/scroll/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="../Templates/Plugin/scroll/js/jquery.kinetic.min.js"></script>
    <script type="text/javascript" src="../Templates/Plugin/scroll/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="../Templates/Plugin/scroll/js/jquery.smoothdivscroll-1.3-min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Templates/Plugin/scroll/css/smoothDivScroll.css">
    
    <script type="text/javascript">
		jQuery.browser = {};
		(function () {
			jQuery.browser.msie = false;
			jQuery.browser.version = 0;
			if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
			jQuery.browser.msie = true;
			jQuery.browser.version = RegExp.$1;
		}
		})();
	</script>
	<script src="../Templates/Scripts/fancybox.js" type="text/javascript"></script>

    <!-- CSS Style -->
    <link href="../Templates/Content/Site.css" rel="stylesheet" type="text/css">
	<link href="../Templates/Content/fancybox.css" rel="stylesheet" type="text/css">
    <link href="../Templates/Content/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../Templates/Content/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../Templates/Content/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 10000
            });
        });
        $(document).ready(function () {
            $("#logOnDialog").click(function (e) {
                e.preventDefault();
                //loadDialog(this);
                $("<div></div>")
                        .addClass("dialog")
                        .attr("id", $(this)
                        .attr("data-dialog-id"))
                        .appendTo("body")
                        .dialog({
                            title: $(this).attr("data-dialog-title"),
                            close: function () { $(this).remove() },
                            modal: true
                        })
                        .load(this.href);
            });

            $(".close").click(function (e) {
                e.preventDefault();
                $(this).closest(".dialog").dialog("close");
            });

            $(function () {
                var button = $('#loginButton');
                var box = $('#loginBox');
                var form = $('#loginForm');
                button.removeAttr('href');
                button.mouseup(function (login) {
                    box.toggle();
                    button.toggleClass('active');
                    $("#username").focus();
                });
                form.mouseup(function () {
                    return false;
                });
                $(this).mouseup(function (login) {
                    if (!($(login.target).parent('#loginButton').length > 0)) {
                        button.removeClass('active');
                        box.hide();
                    }
                });
            });

            $(".changedisplay a").click(function () {
                $("#logindisplay").slideDown('slow');
                $(".changedisplay").slideUp('slow');
				$(".search-menu").select();
            });

            $(".closedisplay").click(function () {
                $("#logindisplay").slideUp('slow');
                $(".changedisplay").slideDown('slow');
				$(".search-menu").select();
            });

            $("#block_inquiry").animate({ width: "190px" }, { queue: false, duration: 500 })
            setTimeout(function () {
                $("#block_inquiry").animate({ width: "58px" }, { queue: false, duration: 500 })
            }, 2000);
            $("#block_inquiry").mouseover(function () {
                $("#block_inquiry").animate({ width: "190px" }, { queue: false, duration: 500 })
            });
            $("#block_inquiry").mouseout(function () {
                $("#block_inquiry").animate({ width: "58px" }, { queue: false, duration: 500 })
            });
        });

        $('#s2').cycle({
            fx: 'scrollDown',
            easing: 'easeOutBounce',
            delay: -2000
        });
		
		(function($, window, undefined) {
			// don't do anything if touch is supported
			// (plugin causes some issues on mobile)
			if('ontouchstart' in document) return;
		
			// outside the scope of the jQuery plugin to
			// keep track of all dropdowns
			var $allDropdowns = $();
		
			// if instantlyCloseOthers is true, then it will instantly
			// shut other nav items when a new one is hovered over
			$.fn.dropdownHover = function(options) {
		
				// the element we really care about
				// is the dropdown-toggle's parent
				$allDropdowns = $allDropdowns.add(this.parent());
		
				return this.each(function() {
					var $this = $(this),
						$parent = $this.parent(),
						defaults = {
							delay: 500,
							instantlyCloseOthers: true
						},
						data = {
							delay: $(this).data('delay'),
							instantlyCloseOthers: $(this).data('close-others')
						},
						settings = $.extend(true, {}, defaults, options, data),
						timeout;
		
					$parent.hover(function(event) {
						// so a neighbor can't open the dropdown
						if(!$parent.hasClass('open') && !$this.is(event.target)) {
							return true;
						}
		
						if(settings.instantlyCloseOthers === true)
							$allDropdowns.removeClass('open');
		
						window.clearTimeout(timeout);
						$parent.addClass('open');
						$parent.trigger($.Event('show.bs.dropdown'));
					}, function() {
						timeout = window.setTimeout(function() {
							$parent.removeClass('open');
							$parent.trigger('hide.bs.dropdown');
						}, settings.delay);
					});
		
					// this helps with button groups!
					$this.hover(function() {
						if(settings.instantlyCloseOthers === true)
							$allDropdowns.removeClass('open');
		
						window.clearTimeout(timeout);
						$parent.addClass('open');
						$parent.trigger($.Event('show.bs.dropdown'));
					});
		
					// handle submenus
					$parent.find('.dropdown-submenu').each(function(){
						var $this = $(this);
						var subTimeout;
						$this.hover(function() {
							window.clearTimeout(subTimeout);
							$this.children('.dropdown-menu').show();
							// always close submenu siblings instantly
							$this.siblings().children('.dropdown-menu').hide();
						}, function() {
							var $submenu = $this.children('.dropdown-menu');
							subTimeout = window.setTimeout(function() {
								$submenu.hide();
							}, settings.delay);
						});
					});
				});
			};
		
			$(document).ready(function() {
				// apply dropdownHover to all elements with the data-hover="dropdown" attribute
				//$('[data-hover="dropdown"]').dropdownHover();
				$("ul.dropdown-menu").css("top", "72%");
				if (window.matchMedia('(max-width: 1024px)').matches) {
					//$("ul.dropdown-menu").offset({top: 193, left: 100});
				}
				else
				{
					//$("ul.dropdown-menu").offset({top: 193, left: 191.5});
				}
			});
		})(jQuery, this);
	
	var attrThisFirst = "a";
	$(document).ready(function() {
		$('title').html("Akachan Shop");
		//$("ul li.dropdown").mouseenter(function(){
		$("ul li.menubar").mouseenter(function(){
			$(".search-menu .sub-menu-wrapper").hide();
			var index = $(this).index() + 1;
			
			var attrThis = $(this).find("a:first-child").attr('id');
			var elementShow = $(this).parent().parent().parent().parent();
			if(attrThis == 'dropdownMenu99')
		   {
			$("[aria-labelledby=" + attrThis + "]").width(200)
			 .css('left', $("#" + attrThis).parent().offset().left - $("#" + attrThis).parent().width() - 10)
		   }
			$(".dropdown-menu[aria-labelledby]").removeClass("open");
			$(".dropdown-menu[aria-labelledby=" + attrThis + "]").addClass("open");
			$(".dropdown-menu[aria-labelledby=" + attrThis + "]").show('slideDown');
			$(".dropdown-menu[aria-labelledby]:not(.open)").hide('slideUp');
			
			if (window.matchMedia('(max-width: 1024px)').matches) {
				//$("ul.dropdown-menu").offset({top: 193, left: 100});
			}
			else
			{
				//$("ul.dropdown-menu").offset({top: 193, left: 191.5});
			}
			//OrderMenu(index);
		}).mouseleave(function(){
			$(".search-menu .sub-menu-wrapper").hide();
			var attrThis = $(this).find("a:first-child").attr('id');
			var elementShow = $(this).parent().parent().parent().parent();
			if($(".dropdown-menu[aria-labelledby=" + attrThis + "]:hover").length > 0)
			{
			}
			else
			{
				//$(".dropdown-menu[aria-labelledby=" + attrThis + "]").hide('slideUp');
			}
		});
		$("div:not(.dropdown-menu[aria-labelledby], .dropdown-menu[aria-labelledby] *)").hover(function() {
			$(".dropdown-menu[aria-labelledby].open").hide('slideUp');
		});
		$(".dropdown-menu[aria-labelledby]").mouseleave(function(){
			var attrThis = $(this).attr("aria-labelledby");
			if($("ul li.dropdown").find("#" + attrThis + ":hover").length > 0)
			{
			}
			else
			{
				$(this).hide('slideUp');
			}
		});
		
		function OrderMenu(id){
		var num = 1;
		$("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child(3n)").each(function(){
			var temp3 = $("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num)+")").css("height");
			var temp2 = $("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num-1)+")").css("height");
			var temp1 = $("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num-2)+")").css("height");
			var temp = "523px";
			if(temp1>=temp2 && temp1>=temp3)
			{	
				temp=temp1;
			}
			else if(temp2>=temp1 && temp2>=temp3)
			{
				temp=temp2;
			}
			else if(temp3>=temp1 && temp3>=temp2)
			{
				temp=temp3;
			}
			$("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num-1)+")").height(temp);
			$("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num-2)+")").height(temp);
			$("ul li.dropdown:nth-child("+id+") ul.dropdown-menu li:nth-child("+(3*num)+")").height(temp);
			num++;
		});
		};
		});
		
		<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
		/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
	 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
	 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
	 *
	 * Version: 0.2.5
	 * 
	 */
		$(document).ready(function() {(function($) {
	
		jQuery.fn.extend({
			slimScroll: function(o) {
	
				var ops = o;
				//do it for every element that matches selector
				this.each(function(){
	
				var isOverPanel, isOverBar, isDragg, queueHide, barHeight,
					divS = '<div></div>',
					minBarHeight = 30,
					wheelStep = 30,
					o = ops || {},
					cwidth = o.width || 'auto',
					cheight = o.height || '240px',
					size = o.size || '7px',
					color = o.color || '#000',
					position = o.position || 'right',
					opacity = o.opacity || .4,
					alwaysVisible = o.alwaysVisible === true;
				
					//used in event handlers and for better minification
					var me = $(this);
	
					//wrap content
					var wrapper = $(divS).css({
						position: 'relative',
						overflow: 'hidden',
						width: cwidth,
						height: cheight
					}).attr({ 'class': 'slimScrollDiv' });
	
					//update style for the div
					me.css({
						overflow: 'hidden',
						width: cwidth,
						height: cheight
					});
	
					//create scrollbar rail
					var rail  = $(divS).css({
						width: '15px',
						height: '100%',
						position: 'absolute',
						top: 0
					});
	
					//create scrollbar
					var bar = $(divS).attr({ 
						'class': 'slimScrollBar ', 
						style: 'border-radius: ' + size 
						}).css({
							background: color,
							width: size,
							position: 'absolute',
							top: 0,
							opacity: opacity,
							display: alwaysVisible ? 'block' : 'none',
							BorderRadius: size,
							MozBorderRadius: size,
							WebkitBorderRadius: size,
							zIndex: 99
					});
	
					//set position
					var posCss = (position == 'right') ? { right: '1px' } : { left: '1px' };
					rail.css(posCss);
					bar.css(posCss);
	
					//wrap it
					me.wrap(wrapper);
	
					//append to parent div
					me.parent().append(bar);
					me.parent().append(rail);
	
					//make it draggable
					bar.draggable({ 
						axis: 'y', 
						containment: 'parent',
						start: function() { isDragg = true; },
						stop: function() { isDragg = false; hideBar(); },
						drag: function(e) 
						{ 
							//scroll content
							scrollContent(0, $(this).position().top, false);
						}
					});
	
					//on rail over
					rail.hover(function(){
						showBar();
					}, function(){
						hideBar();
					});
	
					//on bar over
					bar.hover(function(){
						isOverBar = true;
					}, function(){
						isOverBar = false;
					});
	
					//show on parent mouseover
					me.hover(function(){
						isOverPanel = true;
						showBar();
						hideBar();
					}, function(){
						isOverPanel = false;
						hideBar();
					});
	
					var _onWheel = function(e)
					{
						//use mouse wheel only when mouse is over
						if (!isOverPanel) { return; }
	
						var e = e || window.event;
	
						var delta = 0;
						if (e.wheelDelta) { delta = -e.wheelDelta/120; }
						if (e.detail) { delta = e.detail / 3; }
	
						//scroll content
						scrollContent(0, delta, true);
	
						//stop window scroll
						if (e.preventDefault) { e.preventDefault(); }
						e.returnValue = false;
					}
	
					var scrollContent = function(x, y, isWheel)
					{
						var delta = y;
	
						if (isWheel)
						{
							//move bar with mouse wheel
							delta = bar.position().top + y * wheelStep;
	
							//move bar, make sure it doesn't go out
							delta = Math.max(delta, 0);
							var maxTop = me.outerHeight() - bar.outerHeight();
							delta = Math.min(delta, maxTop);
	
							//scroll the scrollbar
							bar.css({ top: delta + 'px' });
						}
	
						//calculate actual scroll amount
						percentScroll = parseInt(bar.position().top) / (me.outerHeight() - bar.outerHeight());
						delta = percentScroll * (me[0].scrollHeight - me.outerHeight());
	
						//scroll content
						me.scrollTop(delta);
	
						//ensure bar is visible
						showBar();
					}
	
					var attachWheel = function()
					{
						if (window.addEventListener)
						{
							this.addEventListener('DOMMouseScroll', _onWheel, false );
							this.addEventListener('mousewheel', _onWheel, false );
						} 
						else
						{
							document.attachEvent("onmousewheel", _onWheel)
						}
					}
	
					//attach scroll events
					attachWheel();
	
					var getBarHeight = function()
					{
						//calculate scrollbar height and make sure it is not too small
						barHeight = Math.max((me.outerHeight() / me[0].scrollHeight) * me.outerHeight(), minBarHeight);
						bar.css({ height: barHeight + 'px' });
					}
	
					//set up initial height
					getBarHeight();
	
					var showBar = function()
					{
						//recalculate bar height
						getBarHeight();
						clearTimeout(queueHide);
						
						//show only when required
						if(barHeight >= me.outerHeight()) {
							return;
						}
						bar.fadeIn('fast');
					}
	
					var hideBar = function()
					{
						//only hide when options allow it
						if (!alwaysVisible)
						{
							queueHide = setTimeout(function(){
								if (!isOverBar && !isDragg) { bar.fadeOut('slow'); }
							}, 1000);
						}
					}
	
				});
				
				//maintain chainability
				return this;
			}
		});
	
		jQuery.fn.extend({
			slimscroll: jQuery.fn.slimScroll
		});
	
	})(jQuery);
	
	
	//invalid name call
				/*  $('#chatlist').slimscroll({
					  color: '#000000',
					  size: '10px',
					  maxheight: 'auto'                  
				  });*/
				   });
				   
		$(document).ready(function(){
	
		// hide #back-top first
		$("#back-top").hide();
		
		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
	
			// scroll body to 0px on click
			$('#back-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
	
	});
$(document).ready(function () {	
$('.btnAddToCart').on('click', function () {
		var textName = $(this).text();
		//$(this).text('Chờ');
        var cart = $('.cart');
        var imgtodrag = $(this).parent().parent().parent().parent().find('img').eq(0);
		if(imgtodrag.length == 0)
		{
			imgtodrag = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find('img').eq(0);
		}
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 45,
                    'left': cart.offset().left + 80,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            //setTimeout(function () {
            //    cart.effect("shake", {
            //        times: 2
            //    }, 200);
            //}, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
		if($(this).text() != textName)
		{
			$(this).text(textName);
		}		
		var buyproduct = $(this).parent().parent().parent().parent().find('.buyproduct');
		if(buyproduct.length == 0)
		{
			buyproduct = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find('.buyproduct');
		}
		buyproduct.click();
    });	
});			    
    </script> 
  <?php include_once("../Models/function.php"); ?>    
</head>
<body onLoad="">
    <div style="display: none; position: absolute; z-index: 110; left: -800px" id="trailimageid">
    </div>
    <div id="global-common-message" class="commonMessage">
    </div>
    <div id="loading-layer" style="width: 100%; height: 100%; opacity: 0.5; z-index: 2000;
        background-color: White; display: none; position: fixed;">
    </div>
    <div id="dialog">
    </div>
    <div id="dialog_bg" style="background-color: rgba(51,43,46,0.7);">
    </div>
    <header>
        <div id="title">
         <?php include_once("../Controllers/header_logo.php"); ?> 
        <div id="clearbetween">
        </div> 
        </div>
    </header>
    <div id="clearbetween">
    </div>
	<section class="sectionEmail" id="dTopSubMenu">
	<img src="../Templates/Content/images/icon/tem.png" class = "imageLogo" />
        <header class="header">
            <?php include_once("../Controllers/menu_bar.php"); ?>
        </header>
    </section>
    <div id="clearbetween">
    </div>
    <div class="page">
        <section id="main">
            <article class="home">
                <div id="commonMessage">
                </div>
                <div id="orderMessage" class="commonMessage">
                    <p>
                    </p>
                </div>
                <!-- InstanceBeginEditable name="EditRegion3" -->
                <?php include_once("../Controllers/banner_menu.php"); ?>
				<!-- InstanceEndEditable -->

              <div id="clearbetween">
                </div>
                <!-- InstanceBeginEditable name="Main" -->
					<?php
                        include_once("../Controllers/contact.php");
                    ?>
                <!-- InstanceEndEditable -->
                <div id="clearbetween">
                </div>
              <?php include_once("../Controllers/brand.php"); ?>
            </article>
            <div style="clear: both">
            </div>
        </section>
    </div>
   	<!--=================== FOOTER ============================-->
    <?php include_once("../Controllers/footer.php"); ?>
    <!--=================== FOOTER END ============================-->
    
    <!-- ================================== -->
    <!-- ==============Survey============== -->
    <!-- <?php include_once("../Controllers/survey.php"); ?> -->
    <!-- ================================ END Survey ================================ -->
    
    <!-- ================================ Contact Display ================================ -->
   <?php include_once("../Controllers/contact_display.php"); ?>
    <!-- ================================ END Contact Display ================================ -->
    
    <!-- ================================ Login Display ================================ -->
    <div id = "islogin">
		<?php
            if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
            {
                include_once("../Controllers/logOut.php");
            }
            else
            {
                include_once("../Controllers/login.php");
            }
        ?>
    </div>
    <!-- ===================================================== -->
    
    <!-- ================= Back Top =============== -->
	<?php include_once("../Controllers/go_To_top.php"); ?>
    <!-- ===================================================== -->
	    	<script src="../Templates/Plugin/jcart/js/jcart.js" type="text/javascript"></script>
</body>
<!-- InstanceEnd --></html>
