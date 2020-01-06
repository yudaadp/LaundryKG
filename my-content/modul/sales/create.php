<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div id="pos">
            <form action="" id="pos-sale-form"
                  method="post" accept-charset="utf-8">
                <input type="hidden" name=""
                       value="" style="display: none;"/>
                <div class="well well-sm" id="leftdiv">
                    <div id="lefttop" style="margin-bottom: 5px;">
                        <div class="col-sm-12 col-md-12">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <div class="input-group">
                                <input class="form-control" name="cust_nm" value="S-1709-0001/GUEST" id="cust_nm" readonly>
                                <div class="input-group-addon no-print"
                                     style="padding: 2px 5px;">
                                    <a href="#" id="add-customer"
                                       class="external"
                                       data-toggle="modal"
                                       data-target="#lookup_cust"><i
                                                class="fa fa-2x fa-plus-circle"
                                                id="addIcon"></i></a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <input type="text" name="hold_ref" value=""
                                   id="hold_ref"
                                   class="form-control"
                                   placeholder="Transaction note"/>
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-9">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <input type="text" name="code" id="add_item"
                                   class="form-control"
                                   placeholder="Type product code, name or scan the barcode"/>
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <input type="text" name="qty" id="qty"
                                   class="form-control" value="1"/>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <strong style="color: red"><i class="fa fa-bar-chart-o fa-fw"></i> Top Products</strong>
                        <table id="posTable"
                               class="table table-striped table-condensed table-hover list-table top-list"
                               style="margin: 0;">
                            <thead>
                            <tr>
                                <th id="product">Product</th>
                                <th id="price">Price</th>
                                <th id="qty">Discount</th>
                                <th id="delete"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="item_nm">Balon ada aaa</td>
                                <td class="item_price">5,000</td>
                                <td>2</td>
                                <td><i class="fa fa-plus-square-o  fa-fw"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="item_nm">Balon ada aaa</td>
                                <td class="item_price">5,000</td>
                                <td>2</td>
                                <td><i class="fa fa-plus-square-o  fa-fw"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="item_nm">Balon ada aaa</td>
                                <td class="item_price">5,000</td>
                                <td>2</td>
                                <td><i class="fa fa-plus-square-o fa-fw"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="item_nm">Balon ada aaa</td>
                                <td class="item_price">5,000</td>
                                <td>2</td>
                                <td><i class="fa fa-plus-square-o  fa-fw"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="item_nm">Balon ada aaa</td>
                                <td class="item_price">5,000</td>
                                <td>2</td>
                                <td><i class="fa fa-plus-square-o  fa-fw"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="botbuttons" class="col-xs-12 text-center">
                        <div class="row">
                            <div class="col-xs-4" style="padding: 0;">
                                <button type="button"
                                        class="btn btn-danger btn-block btn-flat"
                                        style="height: 67px;" id="reset">Cancel
                                </button>
                            </div>
                            <div class="col-xs-4" style="padding: 0 5px;">
                                <button type="button"
                                        class="btn btn-warning btn-block btn-flat"
                                        style="height: 67px;" id="suspend">Hold
                                </button>
                            </div>
                            <div class="col-xs-4" style="padding: 0;">
                                <button type="button"
                                        class="btn btn-success btn-block btn-flat"
                                        id="payment"
                                        style="height: 67px;">Payment
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <span id="hidesuspend"></span> <input type="hidden"
                                                          name="spos_note"
                                                          value=""
                                                          id="spos_note">

                    <div id="payment-con">
                        <input type="hidden" name="amount" id="amount_val"
                               value=""/> <input
                                type="hidden" name="balance_amount"
                                id="balance_val" value=""/>
                        <input type="hidden" name="paid_by" id="paid_by_val"
                               value="cash"/>
                        <input type="hidden" name="cc_no" id="cc_no_val"
                               value=""/> <input
                                type="hidden" name="paying_gift_card_no"
                                id="paying_gift_card_no_val" value=""/> <input
                                type="hidden"
                                name="cc_holder" id="cc_holder_val" value=""/>
                        <input
                                type="hidden" name="cheque_no"
                                id="cheque_no_val" value=""/> <input
                                type="hidden" name="cc_month" id="cc_month_val"
                                value=""/> <input
                                type="hidden" name="cc_year" id="cc_year_val"
                                value=""/> <input
                                type="hidden" name="cc_type" id="cc_type_val"
                                value=""/> <input
                                type="hidden" name="cc_cvv2" id="cc_cvv2_val"
                                value=""/> <input
                                type="hidden" name="balance" id="balance_val"
                                value=""/> <input
                                type="hidden" name="payment_note"
                                id="payment_note_val" value=""/>
                    </div>
                    <input type="hidden" name="customer" id="customer"
                           value="3"/> <input
                            type="hidden" name="order_tax" id="tax_val"
                            value=""/> <input
                            type="hidden" name="order_discount"
                            id="discount_val" value=""/>
                    <input type="hidden" name="count" id="total_item" value=""/>
                    <input
                            type="hidden" name="did" id="is_delete" value="0"/>
                    <input
                            type="hidden" name="eid" id="is_delete" value="0"/>
                    <input
                            type="hidden" name="total_items" id="total_items"
                            value="0"/> <input
                            type="hidden" name="total_quantity"
                            id="total_quantity" value="0"/>
                    <input type="submit" id="submit" value="Submit Sale"
                           style="display: none;"/>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div id="print">
            <div id="list-table-div">
                <div id="totaldiv">
                    <table id="totaltbl" class="table table-condensed totals"
                           style="margin-bottom: 10px;">
                        <tbody>
                        <tr class="info">
                            <td width="25%">Total Items</td>
                            <td class="text-right" style="padding-right: 10px;"><span
                                        id="count">0</span></td>
                            <td width="25%">Total</td>
                            <td class="text-right" colspan="2"><span id="total">0</span>
                            </td>
                        </tr>
                        <tr class="info">
                            <td width="25%">Discount</td>
                            <td class="text-right" style="padding-right: 10px;"><span
                                        id="ds_con">0</span></td>
                            <td width="25%">Tax</td>
                            <td class="text-right"><span id="ts_con">0</span>
                            </td>
                        </tr>
                        <tr class="success">
                            <td colspan="2" style="font-weight: bold;">Grand
                                Total <a
                                        role="button" data-toggle="modal"
                                        data-target="#noteModal">
                                    <i class="fa fa-comment"></i>
                                </a>
                            </td>
                            <td class="text-right" colspan="2"
                                style="font-weight: bold;"><span
                                        id="total-payable">0</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <table id="posTable"
                       class="table table-striped table-condensed table-hover list-table items_scroll"
                       style="margin: 0;">
                    <thead>
                    <tr>
                        <th id="product">Product</th>
                        <th id="price">Price</th>
                        <th id="qty">Qty</th>
                        <th id="subttl">Subtotal</th>
                        <th id="delete"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ada aaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    <tr>
                        <td class="item_nm">Balon ASD aquaa</td>
                        <td class="item_price">5,000</td>
                        <td>2</td>
                        <td class="item_total">10,000</td>
                        <td><i class="fa fa-trash-o fa-fw"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>