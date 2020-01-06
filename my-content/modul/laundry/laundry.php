<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}

$get_data = new laundry();

foreach ($page_arr as $page) {
  switch (GET_ACT) {
    case $page :
      require_once $page . $EXT;
      break;
  }
}
getlookup_customer();
?>
<div id="ModalEdit" data-backdrop="false"
     style="background-color: rgba(0, 0, 0, 0.5);" tabindex="-1"
     class="modal fade" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript" src="my-library/js/lookup-customer.js"></script>
<script type="text/javascript" src="my-library/js/jquery-ui.js"></script>
<script type="text/javascript" src="my-library/js/sale.js"></script>
