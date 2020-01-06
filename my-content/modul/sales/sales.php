<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$get_data = new Sale ();
echo cek_register();
foreach($page_arr as $page) {
	switch (GET_ACT) {
		case $page :
			require_once $page.$EXT;
	break;
	}
}
getlookup_customers();
?>
<style>
  table.items_scroll {
    border-collapse: collapse;
  }
  table.items_scroll thead {
    background-color: #00aeef;
    border-color: #00aeef;
    color: #fff;
  }
  table.items_scroll thead th {
    text-align: center;
  }
  table.items_scroll #product {
    width: 45%;
  }
  table.items_scroll #qty {
    width: 13%;
  }
  table.items_scroll #subttl {
    width: 19%;
  }
  table.items_scroll #price {
    width: 25px;
  }
  table.items_scroll thead, table.items_scroll tbody {
    display: block;
  }
  table.items_scroll tbody .item_nm {
    width: 40%;
  }
  table.items_scroll tbody .item_price {
    width: 22%;
    text-align: center;
  }
  table.items_scroll tbody .item_total {
    width: 23%;
    text-align: center;
  }
  table.items_scroll tbody .item_qty {
    width: 15%;
    text-align: center;
  }
  table.items_scroll tbody .item_del {
    width: 70px;
    text-align: center;
  }
  table.items_scroll th,  table.items_scroll td {
    padding: 8px 10px;
    width: 117px;
    box-sizing: border-box;
  }
  table.items_scroll tbody {
    height: 278px;
    overflow-y: scroll
  }
</style>
<script type="text/javascript" src="my-library/js/lookup_customer.js"></script>
<script type="text/javascript">

</script>
