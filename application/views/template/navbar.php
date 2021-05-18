<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>

/* NAVIGATION */
nav {
  width: 80%;
  margin: 0 auto;
  background: #fff;
  padding: 50px 0;
  box-shadow: 0px 5px 0px #dedede;
}
nav ul {
  list-style: none;
  text-align: center;
}
nav ul li {
  display: inline-block;
}
nav ul li a {
  display: block;
  padding: 15px;
  text-decoration: none;
  color: #aaa;
  font-weight: 800;
  text-transform: uppercase;
  margin: 0 10px;
}
nav ul li a,
nav ul li a:after,
nav ul li a:before {
  transition: all .5s;
}
nav ul li a:hover {
  color: #555;
}
/* SHIFT */
nav.shift ul li a {
  position:relative;
  z-index: 1;
}
nav.shift ul li a:hover {
  color: #91640F;
}
nav.shift ul li a:after {
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
  background: #F1C40F;
  visibility: none;
  opacity: 0;
  z-index: -1;
}
nav.shift ul li a:hover:after {
  opacity: 1;
  visibility: visible;
  height: 100%;
}
</style>

	<div class="container-fluid" style="background: linear-gradient(180deg, rgba(52,58,64,0.7822479333530288) 14%, rgba(0,0,0,0.46011908181241246) 56%, rgba(255,255,255,0) 100%);">
		<div class="container">
		<nav class="shift">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Rental</a></li>
      <li><a href="<?php echo base_url('index.php/Home/admin_barang')?>">Admin_barang</a></li>
      <li><a href="<?php echo base_url('index.php/Home/admin_order')?>">Admin_order</a></li>
    </ul>
  </nav>
		</div>
	</div>
