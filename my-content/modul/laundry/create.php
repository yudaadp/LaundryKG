<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}
$ssid = $get_data->ssid();
?>
<div class="col-md-12 col-lg-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Transaksi
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="post" id="frmsale"
                          action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>">
                        <input type="hidden" name="ssid" id="ssid"
                               value="<?= $ssid; ?>"/>
                        <input type="hidden" name="event" id="event"
                               value="<?= GET_MOD . '/create'; ?>"/>
                        <input type="hidden" name="sid" id="sid"
                               value="<?= $sid; ?>"/>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <input type="text" name="cust_id"
                                           id="cust_id"
                                           class="form-control"
                                           readonly="readonly"
                                           placeholder="ID"/>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group input-group col-lg-12">
                                    <input type="text" name="custname" id="custname"
                                           class="form-control"
                                           placeholder="Cust name"
                                           readonly="readonly"/> <span
                                            class="input-group-btn">
								<button class="btn btn-default" type="button"
                                        data-toggle="modal"
                                        data-target="#myModal">
									<i class="fa fa-search"></i>
								</button>
							</span>
                                </div>
                            </div>
       <!--                     <div class="col-sm-12 col-md-12 col-lg-12">
                                <button class="btn btn-success btn-block"
                                        id="addnewcust"
                                        type="submit"><i
                                            class="fa fa-plus-circle fa-fw"></i>
                                    Buat Customer Baru
                                </button>
                            </div>-->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="addrs" id="addrs"
                                           class="form-control"
                                           readonly="readonly"
                                           placeholder="Alamat"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone"
                                           class="form-control" value=""
                                           readonly="readonly"
                                           placeholder="Phone number"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="end_date"
                                           id="end_date" value=""
                                           class="form-control"
                                           placeholder="Tanggal Selesai"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="trx_note"
                                           id="trx_note" value=""
                                           class="form-control"
                                           placeholder="Catatan..."/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div id="gt"
                                 style="margin-bottom: 10px; border-radius: 10px 30px; width: 100%; height: 85px; background-color: #ffa924; text-align: center; padding: 15px; font-size: 32pt; color: #ffffff">
                                0.00
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="trx_paid" id="trx_paid"
                                           class="form-control"
                                           placeholder="TOTAL PEMBAYARAN/DP"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <input type="text" name="prod_nm"
                                           id="prod_nm"
                                           class="form-control"
                                           placeholder="type product code or name here..."
                                           required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <input type="number" name="qty"
                                           id="qty"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <button class="btn btn-success btn-block"
                                        id="addtocart"
                                        type="submit"><i
                                            class="fa fa-plus-circle fa-fw"></i>
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <form method="post" id="frmcheckout"
          action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>">
        <input type="hidden" name="event" value="<?=GET_MOD.'/checkout';?>"/>
        <input type="hidden" name="ssid" value="<?= $ssid;?>"/>
        <input type="hidden" name="sid" value="<?= $sid;?>"/>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <button class="btn btn-success btn-lg btn-block" id="print_label"
                    type="submit" style="margin: -15px 0 5px 0;"><i
                        class="fa fa-print fa-fw"></i>LABEL
            </button>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <button class="btn btn-danger btn-lg btn-block" id="checkout"
                    type="submit" style="margin: -15px 0 5px 0;"><i
                        class="fa fa-print fa-fw"></i>SELESAI & CETAK STRUK
            </button>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Produk
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%"
                           class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="tbdata">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
