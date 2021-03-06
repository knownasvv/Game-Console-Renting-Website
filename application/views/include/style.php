<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo/dark_square.png')?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css'); ?>"/>

<?php if(isset($crud)) 
	foreach ($crud['css_files'] as $file): ?>
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
	margin:0; padding:0; height:100%; width: 100%;
	position: relative;
    min-height: 100%;
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

hr {
	margin-top: 1rem;
	margin-bottom: 1rem;
	border: 0;
	border-top: 1px solid rgba(0, 0, 0, 1);
}
.a-effect {
	padding: 15px;
	text-decoration: none;
	color: #F1F1F1;
	font-weight: 400;
	text-transform: uppercase;
	margin: 0 5px;
}
a.a-effect, a.a-effect:after, a.a-effect:before { transition: all .5s; }
a.a-effect:hover { color: #fff; }

/* SHIFT */
nav.shift a.a-effect{ position: relative; z-index: 1; }
nav.shift a.a-effect:hover { color: rgb(43,45,66); }
nav.shift a.a-effect:after {
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
nav.shift a.a-effect:hover:after { opacity: 1; visibility: visible; height: 100%; }

@media only screen and (max-width: 768px) { .header-1{ display:none; } }
@media only screen and (max-width: 465px) { .header-3{ display:none; } }
</style>

<!-- FOOTER -->
<style>
/* Main Footer */
footer { 
	bottom: 0;
    left: 0;
 	position: fixed;/* Updated Property */
    font-size: 0.8em;
    width:100%;
}
@media only screen and (max-width: 767px){
	footer{
		position:static;
	}
}
footer { background: #F7EC59; }
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
