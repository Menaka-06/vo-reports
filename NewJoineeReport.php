 <?php //$method=""; $method=$this->router->fetch_method(); ?> 
<div class="container-fluid">
    <!-- start page title -->
   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?php echo $page_name;?></h4>
            

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Search New Joinee Report</h4>
                    <div class="flex-shrink-0 d-none">
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="live-preview">
                        <form action="<?php echo base_url();?>Directseller/generateNewJoineeReport" method="post">
                        <div class="row gy-4">
                            <div class="col-xxl-2 col-md-3">
                                <div>
                                    <label for="category_name" class="form-label ">From Date</label>
                                    <input type="date" class="form-control" id="from_date"  name="from_date" value="<?php if(isset($from_date)){ echo date('Y-m-d',strtotime($from_date));}?>">
                                    <span class="text-danger small" id="category_name_error"></span>
                                </div>
                            </div>

                            <div class="col-xxl-2 col-md-2">
                                <div>
                                    <label for="category_name" class="form-label ">To Date</label>
                                    <input type="date" class="form-control" id="to_date"  name="to_date" value="<?php if(isset($to_date)){ echo date('Y-m-d',strtotime($to_date));}?>">
                                    <span class="text-danger small" id="category_name_error"></span>
                                </div>
                            </div>

                            <div class="col-xxl-2 col-md-2">
                                <div>
                                    <label for="category_name" class="form-label">Sponsor Id </label>
                                    <input type="text" class="form-control" id="sponsorId"  name="sponsorId" value="<?php if(isset($sponsorId)){ echo $sponsorId; }?>">
                                    <span class="text-danger small" id="short_code_error"></span>
                                </div>
                            </div>

                            <div class="col-xxl-2 col-md-2">
                                <div>
                                    <label for="category_name" class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">--status--</option>
                                        <option value="Active" <?php if(isset($status)){ if($status=="Active"){ echo 'Selected';} }?>>Active</option>
                                        <option value="Pending" <?php if(isset($status)){ if($status=="Pending"){ echo 'Selected';} }?>>Pending</option>
                                        <option value="Inactive" <?php if(isset($status)){ if($status=="Inactive"){ echo 'Selected';} }?>>Inactive</option>
                                    </select>
                                    <span class="text-danger small" id="category_name_error"></span>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-2">
                                <div class= "mt-4">
                                    <label for="category_name" class="form-label mt-3"></label>
                                    <button type="submit" class="btn btn-success btn-sm mt-2" name="search_newjoinee_report">Search</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
     <?php // if($method=='generateNewJoineeReport'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><?php echo $page_name;?> Details</h4>
                    <?php if(!empty($new_joinee)){ ?>
                        <form method="post" action="<?php echo base_url();?>directseller/NewJoineereportExcelDownload">
                            <input type="hidden" class="form-control" id="search_from_date"  name="search_from_date" value="<?php if(isset($from_date)){ echo date('Y-m-d',strtotime($from_date));}?>">
                            <input type="hidden" class="form-control" id="search_to_date"  name="search_to_date" value="<?php if(isset($to_date)){ echo date('Y-m-d',strtotime($to_date));}?>">
                            <button type="submit" class="btn btn-success waves-effect waves-light"> <i data-feather="download-cloud"></i>&nbsp;&nbsp; Download Excel</button>
                        </form>
                    <?php } ?> 
                    
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No</th>
                                                <th scope="col">Direct Seller Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Sponsor Id</th>
                                                <th scope="col">Placement Id</th>
                                                <th scope="col">Registration Date</th>
                                                <th scope="col">Activation Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">First BV Acheived Date</th>
                                                <th scope="col">Total BV </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  if(!empty($new_joinee)){ foreach($new_joinee as $NJ){ $lmt++; ?>
                                            <tr>
                                                <td><?php echo $lmt; ?></td>
                                                <td><?php if(!empty($NJ->distributerId)){ echo $NJ->distributerId;}?></td>
                                                <td><?php if(!empty($NJ->distributerName)){ echo $NJ->distributerName;}?></td>
                                                <td><?php if(!empty($NJ->sponsorId)){ echo $NJ->sponsorId;}?></td>
                                                <td><?php if(!empty($NJ->placementId)){ echo $NJ->placementId;}?></td>
                                                <td><?php if(!empty($NJ->createdAt)){ echo date('d-M-Y',strtotime($NJ->createdAt));?><br><span class="ft-10"> <?php echo date('h:i:s:a',strtotime($NJ->createdAt));?></span><?php } ?></td>
                                                <td><?php if(!empty($NJ->activatedAt)){ echo date('d-M-Y',strtotime($NJ->activatedAt));?><br><span class="ft-10"> <?php echo date('h:i:s:a',strtotime($NJ->activatedAt));?></span><?php } ?></td>
                                                <td><?php if(!empty($NJ->status)){ echo $NJ->status;}?></td>
                                                <?php 
                                                    $first_bv_date=$total_bv='----'; 
                                                    if($NJ->status=='Active'){ 
                                                        $bvdetails=$this->directseller_model->getbvdateBv($NJ->id);
                                                        $first_bv_date=$bvdetails['first_bv_date'];
                                                        $total_bv=$bvdetails['total_bv'];
                                                    } 
                                                ?>
                                                <td><?php echo $first_bv_date;?></td>
                                                <td><?php echo $total_bv; ?></td>
                                            </tr>
                                        <?php  } } else{ ?>
                                            <tr>
                                                <td align="center" colspan="10">No Records Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                    <nav class="mt-3 d-block">
                                        <?php echo $this->pagination->create_links(); ?>
                                    </nav>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>
                    
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
<?php //} ?>
</div>

<!-- container-fluid -->
