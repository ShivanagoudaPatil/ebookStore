<?php

class caseProduct {

    var $db;

    function __construct(){
        $this->db = new ezSQLMysql();
    }

    function updateTempProduct($case_id = null){

        $sql = $case_id ? "select * from `case_detail` INNER JOIN `product` ON case_detail.pid = product.pid where case_detail.case_id = '{$case_id}'" : "SELECT * FROM `tpm_product` ORDER BY id ";
        $product = $this->db->get_results($sql, ARRAY_A);

        $data ='<header>                     
          <span class="widget-icon"> <i class="fa fa-table"></i> </span>
            <h2>Selected Products</h2>
        </header>

        <div>
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body no-padding">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product name</th>
                        <th>Teeth</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>';

        foreach ($product as $p) {
            $data .=  '<tr>';
                if($case_id) {
                    $data .= '<td class="actionTD">
                            <a class="btn btn-primary btn-circle edit_product" data-pid="'.$p['pid'].'" data-case-id="'.$case_id.'" style="width: 20px;height: 20px;text-align: center;padding: 1px 3px;font-size: 10px;line-height: 16px;">
                            <i class="glyphicon glyphicon-pencil"></i></a>
                            <a class="btn btn-danger btn-circle delete_product" data-pid="'.$p['pid'].'" data-case-id="'.$case_id.'" style="width: 20px;height: 20px;text-align: center;padding: 1px 3px;font-size: 10px;line-height: 16px;">
                            <i class="glyphicon glyphicon-remove"></i></a>
                        </td>';
                }
                else
                {
                    $data .= '<td class="actionTD">
                            <a class="btn btn-primary btn-circle edit_product" data-pid="' . $p['pid'] . '" style="width: 20px;height: 20px;text-align: center;padding: 1px 3px;font-size: 10px;line-height: 16px;">
                            <i class="glyphicon glyphicon-pencil"></i></a>
                            <a class="btn btn-danger btn-circle delete_product" data-pid="' . $p['pid'] . '" style="width: 20px;height: 20px;text-align: center;padding: 1px 3px;font-size: 10px;line-height: 16px;">
                            <i class="glyphicon glyphicon-remove"></i></a>
                        </td>';
                }
                        $data .= '<td>'.$p['product_name'].'</td>
                        <td>'.$p['teeth'].'</td>
                        <td>'.$p['qty'].'</td>
                        <td>$'.$p['price'].'</td>
                        <td>'.$p['discount'].'</td>
                        <td>$'.$p['price'] * $p['qty'].'</td>
                    </tr>';
        }

        $data .= '</tbody>
                </table>
            </div>
        </div>
        <script type="text/javascript">
        $(".edit_product").click(function(){
            
            var pid=$(this).data("pid"),
                caseId=$(this).data("case-id");
            
            $.ajax({
                type: "POST",
                url: "ajaxHandler.php",
                data: { pid: pid, caseId: caseId, type: "editTmpProduct" },
                success: function(data){
                    $(".selectedProductForm").html(data);
                }
            });
        });

        $(".delete_product").click(function(){
            
            var pid=$(this).data("pid"),
                caseId=$(this).data("case-id");
            
                $.ajax({
                    type: "POST",
                    url: "ajaxHandler.php",
                    data: { pid: pid, caseId: caseId, type: "deleteTmpProduct" },
                    success: function(data){
                        $(".selectedProduct").html(data);
                        $(".hideHeader header").empty();
                        $(".hideHeader .actionTD").empty();
                    }
                });
        });
            </script>';


        return $data;
    }

    function editTempProduct($pid, $case_id = null)
    {

        $sql = $case_id ? "select * from `case_detail` INNER JOIN `product` ON case_detail.pid = product.pid where case_detail.case_id = '{$case_id}' AND case_detail.pid = '{$pid}'" : "SELECT * FROM `tpm_product` WHERE pid = '{$pid}'";
        $product = $this->db->get_row($sql, ARRAY_A);

        $data = '<form class="form-horizontal" id="save-selected-product" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" type="hidden" name="tmp_id" id="tmp_id" value="'.$pid.'">
                                <input class="form-control" type="hidden" name="case_id" id="case_id" value="'.$case_id.'">
                                <input class="form-control" type="hidden" name="type" value="saveSelectProduct">
                                <input class="form-control" type="text" name="product_name" value="'.$product['product_name'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Quantity</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="qty" value="'.$product['qty'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Unit Price</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text" name="price" value="'.$product['price'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Discount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="discount" value="'.$product['discount'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Reason</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="reason" value="'.$product['reason'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Teeth No.</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="teeth" value="'.$product['teeth'].'">
                            </div><span><a class="btn btn-default teethImgShow"><i class="glyphicon glyphicon-search"></i></a></span>
                        </div>
                        <div class="form-group" id="teethImg" style="margin-left: 166px; border: 1px solid #ccc; padding: 5px;">
                            <img src="img/teethChart.gif" />
                        </div>
                        
                        <div class="form-group col-md-9" style="float: left; margin-left: 154px;">
                            <button type="submit" class="btn btn-success btn-sm" style="float: left;">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Save
                            </button>
                        </div>
                    </fieldset>
                </form>
                <script type="text/javascript">
                
                    var teethImgShow = true; 
                        
                    $(".teethImgShow").click(function() {
                          teethImgShow = !teethImgShow;
                          if(teethImgShow){
                              $("#teethImg").show();
                          }else{
                              $("#teethImg").hide();
                          }                
                    });
                
                    $("#save-selected-product").submit(function(event){
                        
                        event.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "ajaxHandler.php",
                            data: $(this).serialize(),
                            success: function(data){
                                $(".selectedProduct").html(data);
                                $(".selectedProductForm").html("");
                                $(".hideHeader header").empty();
                                $(".hideHeader .actionTD").empty();
                            }
                        });
                    });
                </script>';

        return $data;


    }

}