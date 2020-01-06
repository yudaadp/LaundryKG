<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}
?>
<div class="col-md-12 col-lg-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sale Info
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
                                    <input type="text" name="store_id" id="store_id"
                                           class="form-control"
                                           readonly="readonly"
                                           placeholder="ID"/>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group input-group col-lg-12">
                                    <input type="text" name="store" id="store"
                                           class="form-control"
                                           placeholder="Store name"
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="kota" id="kota"
                                           class="form-control"
                                           readonly="readonly"
                                           placeholder="City"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone"
                                           class="form-control"
                                           readonly="readonly"
                                           placeholder="Phone number"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="inv" id="inv"
                                           class="form-control"
                                           placeholder="Invoice code"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="sale_dt"
                                           id="sale_dt"
                                           class="form-control"
                                           placeholder="Transaction date"/>
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
                                    <input type="text" name="cust" id="cust"
                                           class="form-control"
                                           placeholder="Customer name" value="GUEST"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <input type="text" name="prod_nm"
                                           id="prod_nm"
                                           class="form-control"
                                           placeholder="type product code or name here..." required/>
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
                                <button class="btn btn-success btn-block" id="addtocart"
                                        type="submit"><i
                                            class="fa fa-plus-circle fa-fw"></i>
                                    add
                                    to cart
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>