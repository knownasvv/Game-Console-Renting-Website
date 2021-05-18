<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
<?php foreach ($crud['css_files'] as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<!-- HEADER & NAVBAR -->
<style>
*{ font-family: 'Roboto', sans-serif; }

h1, h2, h3, h4, h5, h6, p, section, body{
	margin: 0;
	padding: 0;
}

body{
	margin:0;
   padding:0;
   height:100%;
}

header{
	top: 0px;
	width: 100%;
	height: 25px;
	background: var(--unnamed-color-ff66d8) 0% 0% no-repeat padding-box;
	border: 1px solid var(--unnamed-color-707070);
	background: #FF66D8 0% 0% no-repeat padding-box;
	border: 1px solid #707070;
	opacity: 0.8;
}

nav{ background: linear-gradient(180deg, rgba(52,58,64,0.7822479333530288) 14%, rgba(0,0,0,0.46011908181241246) 56%, rgba(255,255,255,0) 100%); }
nav div ul li a {
	padding: 15px;
	text-decoration: none;
	color: #F1F1F1;
	font-weight: 400;
	text-transform: uppercase;
	margin: 0 5px;
}
nav div ul li a, nav ul li a:after, nav ul li a:before { transition: all .5s; }
nav div ul li a:hover { color: #fff; }

/* SHIFT */
nav.shift div ul li a {
	position: relative;
	z-index: 1;
}
nav.shift div ul li a:hover { color: rgb(43,45,66); }
nav.shift div ul li a:after {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	margin: auto;
	width: 100%;
	height: 1px;
	content: '.';
	color: transparent;
	background: #95D8EC;
	visibility: none;
	opacity: 0;
	z-index: -1;
}
nav.shift div ul li a:hover:after {
	opacity: 1;
	visibility: visible;
	height: 100%;
}
</style>

<!-- FOOTER -->
<style>
/* Main Footer */
footer { width: 100%; font-size: 0.7rem; }
footer .main-footer{ padding: 10px 0;  background: #F7EC59; }
footer ul{ padding-left: 0;  list-style: none; }

/* Footer transparent */
footer.transparent .footer-top, footer.transparent .main-footer{ background: transparent;}
footer.transparent .footer-copyright{ background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3) ;}

/* Footer 4 */
.footer- .logo { display: inline-block;}

/*==================== 
  Widgets 
====================== */
.widget.widget-last{  margin-bottom: 0px;}
.widget.no-box{ padding: 0; background-color: transparent;
  box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; -ms-box-shadow: none; -o-box-shadow: none;}
.widget li a{ color: #ff8d1e;}
.widget li a:hover{ color: #4b92dc;}
.widget-title span {background: #839FAD none repeat scroll 0 0;display: block; height: 1px;margin-top: 5px;position: relative;width: 100%;}
.widget-title span::after {background: inherit;content: "";height: inherit;    position: absolute;top: -4px;width: 50%;}
.widget-title.text-center span,.widget-title.text-center span::after {margin-left: auto;margin-right:auto;left: 0;right: 0;}
.widget .badge{ float: right; background: #7f7f7f;}

</style>
