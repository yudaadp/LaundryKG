<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation"
	style="margin-bottom: 0px; position: fixed; width: 100%">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="home.php"><b>LaundryKu<sup>v1.0</sup></b></a>
	</div>

	<ul class="nav navbar-top-links navbar-right">
		<li><i><?= dayID(CUR_DATE.CUR_TIME);?></i></li>
		<li>| <strong><?= ucwords($_SESSION['mywebs_uid']);?></strong></li>
		<li><a href="home.php?menu/sales/create/<?=$sid;?>"><i class="fa fa-shopping-cart fa-lg"></i> <sup
				style="color: #F90; font-weight: bold">2</sup></a></li>
		<li><a href="#" data-toggle="modal"
               data-target="#cash-register-details"><i class="fa fa-usd fa-lg"></i></a></li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
			href="#"> <i class="fa fa-th-list fa-fw"></i> <i
				class="fa fa-caret-down"></i>
		</a>
			<ul class="dropdown-menu dropdown-alerts">
				<li class="sidebar-search"><input type="text" id="find_mn"
					name="find_mn" class="form-control" placeholder="Find Menu"></li>
				<div id="result"></div>
				<li class="divider"></li>
				<?php include 'mynavbar.php'; ?>
			</ul></li>
	</ul>
</nav>