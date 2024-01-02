<div class="container-fluid">
    <!-- start page title -->
    <?php $method=""; $method=$this->router->fetch_method();?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1"><?php echo $page_name;?></h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="<?php echo base_url();?>inventory/generateStockAdjusmentReport"  method="post">
                        <div class="row gy-4">
                            <div class="col-xxl-2 col-md-3">
                                <div>
                                    <label for="from_date" class="form-label ">From Date</label>
                                    <input type="date" class="form-control" id="from_date"  value="<?php if(isset($from_date)){echo date('Y-m-d',strtotime($from_date));}else{ echo date('Y-m-01'); }?>"  name="from_date" required>
                                    <span class="text-danger small" id="date_error"></span>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <div>
                                    <label for="to_date" class="form-label ">To Date</label>
                                    <input type="date" class="form-control" id="to_date"  name="to_date" value="<?php if(isset($to_date)){echo date('Y-m-d',strtotime($to_date));}else{ echo date('Y-m-d'); }?>" required>
                                    <span class="text-danger small" id="to_date_error"></span>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <div>
                                    <label for="stockist" class="form-label ">Stockist</label>
                                    <select class="form-control" name="stockist" id="stockist" required>
                                        <option value="">--Select Stockist--</option>
                                        <?php if(!empty($customer)){  foreach($customer as $cus){?>
                                            <option value="<?php echo $cus->id; ?>" <?php if(isset($stockist)){ if($cus->id==$stockist){ echo 'selected';}}?>><?php echo $cus->CustomerName; ?>-<?php echo $cus->CustomerCode; ?></option>
                                            <?php } }?>
                                    </select>
                                    <span class="text-danger small" id="date_error"></span>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-2">
                                <div class= "mt-4">
                                    <label for="category_name" class="form-label mt-3"></label>
                                    <button type="submit" class="btn btn-success btn-sm mt-2" name="stock_adj_report">Search Report</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <?php if($method=='generateStockAdjusmentReport'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><?php echo $page_name;?> Details</h4>
                    <div class="flex-shrink-0">
                    <form action="<?php echo base_url();?>inventory/downloadstockadjustmentExcelReport" method="post">
                    <input type="hidden"  name="search_from_date" value="<?php if(isset($from_date)){ echo $from_date; } ?>">
                    <input type="hidden"  name="search_to_date" value="<?php if(isset($to_date)){ echo $to_date; } ?>">
                    <input type="hidden"  name="search_stockist_id" value="<?php if(isset($stockist)){ echo $stockist; } ?>">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <i data-feather="download-cloud"></i>&nbsp;&nbsp;Download Excel</button>
                    </form>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>

                                   
                                    <th scope="col">Date</th>
                                    <th scope="col">Stock Adjustment Code</th>

                                    <th scope="col">Stockist Name</th>
                                    <th scope="col">Stockist Code</th>
                                    <th scope="col">Product SKU</th>
                                    <th scope="col">Product Name</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($stockadjustment_report)){ foreach($stockadjustment_report as $SAR){ ?>
                                    <tr>
                                        
                                        <td><?php if(!empty($SAR->addedDate)){ echo date('d-m-Y',strtotime($SAR->addedDate)); }?></td>
                                        <td><?php if(!empty($SAR->stockAdjustmentCode)){ echo $SAR->stockAdjustmentCode; }?></td>
                                        <td><?php if(!empty($SAR->customerName)){ echo $SAR->customerName; }?></td>
                                        <td><?php if(!empty($SAR->CustomerCode)){ echo $SAR->CustomerCode; }?></td>
                                        <td><?php if(!empty($SAR->Sku)){ echo $SAR->Sku; }?></td>
                                        <td><?php if(!empty($SAR->productName)){ echo $SAR->productName; }?></td>
                                        </tr>
                                        <?php } }else{ ?>
                                        <tr>
                                            <td colspan="17" align="center">No Records Found</td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                        <nav class="mt-3 d-block">
                                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

 <?php } ?>
</div>
