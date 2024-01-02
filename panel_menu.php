<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo base_url();?>user/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo base_url();?><?php echo SITE_LOGO_PATH;?>" alt="<?php echo SITE_TITLE; ?>">
            </span>
            <span class="logo-lg">
                <img src="<?php echo base_url();?><?php echo SITE_LOGO_PATH;?>" alt="<?php echo SITE_TITLE; ?>">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo base_url();?>user/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo base_url();?><?php echo SITE_LOGO_PATH;?>" alt="<?php echo SITE_TITLE; ?>">
            </span>
            <span class="logo-lg">
                <img src="<?php echo base_url();?><?php echo SITE_LOGO_PATH;?>" alt="<?php echo SITE_TITLE; ?>">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <?php if($this->session->userdata('login_status')){?>
                <?php $master=array('materialcategory'=>'listMaterialCategory'); ?>
                <?php if($this->rbac->display_operation('user','dashboard')){?>
                <!-- <li class="nav-item">
                    <a href="<?php echo base_url();?>user/dashboard" class="nav-link" data-key="t-analytics"> <i
                            class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span> </a>
                </li> -->
                <?php } ?>
                <?php if($this->rbac->check_module_permission_arr($master) & (1==2)){?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-stack-line"></i> <span data-key="t-dashboards">Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <?php if($this->rbac->display_operation('materialcategory','listMaterialCategory')){?>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>materialcategory/listMaterialCategory" class="nav-link"
                                    data-key="t-analytics"> Material Category</a>
                            </li>
                            <?php } ?>
                            <?php //if($this->rbac->display_operation('materialsubcategory','listMaterialSubCategory')){ ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>materialsubcategory/listMaterialSubCategory"
                                    class="nav-link" data-key="t-crm">Material Sub Category</a>
                            </li>
                            <?php //} ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>" class="nav-link" data-key="t-ecommerce"> Alloy
                                    Details </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>" class="nav-link" data-key="t-crypto"> Drawing / Items
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <?php } ?>
                <?php } ?>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="max-width:100%">
        <div class="scroll-left">

            <i class="ri-arrow-left-s-line"></i>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <!-- Nav Toggle Button -->
                <!-- <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <!-- Nav Links -->
                <div class="collapse navbar-collapse justify-content-center lh-lg collapse show" id="main_nav">
                    <ul class="navbar-nav p-3 p-md-0 scrollmenu">
                        <!-- Mega Menu starts -->
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo base_url();?>user/dashboard">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Direct Seller Management
                            </a>

                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/directSellerRegistration"
                                                class="dropdown-item" data-key="t-analytics"> Direct Sellers
                                                registration</a>
                                        </div>
                                        <!-- <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/directSellerList"
                                                class="nav-link" data-key="t-crm">Direct Sellers List</a>
                                        </div> -->
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Genelogy/listGenology"
                                                class="dropdown-item" data-key="t-ecommerce"> Geneology </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/tabularView"
                                                class="dropdown-item" data-key="t-crypto"> Tabular View </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href=" " class="dropdown-item" data-key="t-crypto"> Tree Trimming </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/sponsorChange"
                                                class="dropdown-item" data-key="t-crypto"> Sponsor Change </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/directSellerspasswordChange"
                                                class="dropdown-item" data-key="t-crypto"> DS Password change
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/listEmailMobileChange"
                                                class="dropdown-item" data-key="t-crypto"> DS Mobile/Email change
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/kycAddresschange"
                                                class="dropdown-item" data-key="t-crypto"> KYC & Address Change </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/directSelleractivation"
                                                class="dropdown-item" data-key="t-crypto"> Direct Seller Activation </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/Ranklistings"
                                                class="dropdown-item" data-key="t-crypto"> Rank Listings </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/Personalbvlistings"
                                                class="dropdown-item" data-key="t-crypto"> Personal BV Listings
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/EmeraldAboveLisitngs"
                                                class="dropdown-item" data-key="t-crypto"> Emerald & Above
                                                Lisitngs </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/Rankpromotedlisitngs"
                                                class="dropdown-item" data-key="t-crypto"> Rank Promoted Lisitngs
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/bonusCommissions"
                                                class="dropdown-item" data-key="t-crypto"> Bonus Commissions </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>directseller/Bonuspayout"
                                                class="dropdown-item" data-key="t-crypto">Bonus Payout </a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>directseller/Directsellerreport">Direct
                                                seller Report</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>directseller/Rankreport">Rank
                                                Report
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Personalbvreport">Personal
                                                BV report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/EmeraldManagerReport">Emerald
                                                Manager Report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Rankpromotedreport">Rank
                                                Promoted report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Bonuscommissionreport">Bonus
                                                Commission report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Bonuspayoutreport">Bonus
                                                Pay-outs report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/NewJoineeReport">New
                                                Joinee report </a>
                                        </div>
                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Bonusmaster">Bonus Master
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Rankmaster">Rank master </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/KYCmaster">KYC Master </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/State">State </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>directseller/City">City</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Directseller/Country">Country </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Mega Menu starts -->
                        </li>

                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Purchase Management
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Purchase_request/listpurchase_request"
                                                class="dropdown-item" data-key="t-analytics"> Purchase Request</a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Vendor/VendorQuotation"
                                                class="dropdown-item" data-key="t-crypto"> Vendor Quotation </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Purchase_request/Quotationcomparison"
                                                class="dropdown-item" data-key="t-crypto"> Quotation comparison
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Purchaseorder/listPurchaseorder"
                                                class="dropdown-item" data-key="t-analytics"> Purchase Order</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Purchaseorder/purchaseInvoice"
                                                class="dropdown-item" data-key="t-crypto"> Purchase Invoice </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Purchaseorder/orderReturns"
                                                class="dropdown-item" data-key="t-crypto"> Purchase Returns </a>
                                        </div>


                                    </div>
                                    <h3 class="megamen_header mt-0">External Purchase</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>expurchase/listvendor"
                                                class="dropdown-item" data-key="t-analytics">Vendor</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>expurchase/listpurchase_request"
                                                class="dropdown-item" data-key="t-analytics">Purchase Order</a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>expurchase/VendorQuotation"
                                                class="dropdown-item" data-key="t-crypto">Goods Received Note</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>expurchase/Quotationcomparison"
                                                class="dropdown-item" data-key="t-crypto">Purchase Invoice
                                            </a>
                                        </div>
                                        


                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Purchaserequestreport">Purchase
                                                Request report</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Vendorquotationreports">Vendor
                                                quotation reports
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Purchaseorderreport">Purchase
                                                Order report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Purchaseinvoicereport">Purchase
                                                Invoice report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Purchasereturnsreport">Purchase
                                                returns report </a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Vendor">Vendor </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>products/listProducts">Products </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Vendorproducts">Vendor-products
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Purchase_request/Generalsettings">General
                                                settings </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </li>
                        <!-- Tree Menu -->
                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Inventory Management
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Openingstock/listOpeningStock"
                                                class="dropdown-item" data-key="t-crm">Opening Stock </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/goodsRecievednote"
                                                class="dropdown-item" data-key="t-analytics"> Goods Received Note</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/packingList"
                                                class="dropdown-item" data-key="t-analytics"> Packing Lists</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/inventoryDeliverynote"
                                                class="dropdown-item" data-key="t-analytics"> Inventory Delivery
                                                Note</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/stockTransfer"
                                                class="dropdown-item" data-key="t-crypto"> Stock Transfer </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/stockdetails"
                                                class="dropdown-item" data-key="t-crypto"> Stock Details</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/stockAdjustment"
                                                class="dropdown-item" data-key="t-ecommerce"> Stock Adjustment</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/wastage" class="dropdown-item"
                                                data-key="t-crypto"> Wastage Entries</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/salesReturnnote"
                                                class="dropdown-item" data-key="t-analytics"> Sales Return Note</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Inventory/purchaseReturnnote"
                                                class="dropdown-item" data-key="t-analytics"> Purchase Return Note</a>
                                        </div>


                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Openingstockreport">Opening
                                                stock report</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Goodsreceivednotereport">Goods
                                                Received Note report
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Packinglistreport">Packing List
                                                report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Inventorydeliverynotereport">Inventory
                                                Delivery Note report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Stocktransferreport">Stock
                                                Transfer report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Stockadjustmentreport">Stock
                                                Adjustment report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Wastageentriesreport">Wastage
                                                entries report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Salesreturnnotereport">Sales
                                                return
                                                note report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Purchasereturnnotereport">Purchase
                                                return note report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Stockledgerreport">Stock Ledger
                                                report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Stockvaluereport">Stock Value
                                                report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/StockReport">Stock Report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Wastagereport">Wastage
                                                report </a>
                                        </div>
                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Storessettings">Stores </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Warehousesettings">Warehouse
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Products">Products </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Racks">Racks </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Bin">Bin</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Generalsettings">General
                                                Settings </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>Inventory/Permission">Permission
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Sales & Distribution Management
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/OnlinesalesOrder"
                                                class="dropdown-item" data-key="t-crypto"> Online Sales Order
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/SalesOrderAssignedtostockist"
                                                class="dropdown-item" data-key="t-crypto"> Sales Order Assign To
                                                Stockist
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/Proposal"
                                                class="dropdown-item" data-key="t-crypto"> Proposal
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/Salesquotation"
                                                class="dropdown-item" data-key="t-crypto"> Sales Quotation
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/Performainvoice"
                                                class="dropdown-item" data-key="t-crypto"> Performa invoice
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/onlineSales"
                                                class="dropdown-item" data-key="t-crypto"> Sales Order </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>saleinvoiceSTK/listsalesInvoice"
                                                class="dropdown-item" data-key="t-crypto"> Sales Invoice - Stockist</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>saleinvoice/listsalesInvoice"
                                                class="dropdown-item" data-key="t-crypto"> Sales Invoice - Distibuter</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/Salesreturn"
                                                class="dropdown-item" data-key="t-crypto"> Sales Return </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/creditsDebits"
                                                class="dropdown-item" data-key="t-analytics"> Credit and Debits</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/Pos"
                                                class="dropdown-item" data-key="t-analytics">Counter Sales</a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Unitofmeasurement">Unit
                                                of Measurement </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Products">Products </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>pricebook/listPriceBook"
                                                class="dropdown-item" data-key="t-crm">Price Book & BV</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>salesdistribution/schemeManagement"
                                                class="dropdown-item" data-key="t-ecommerce"> Scheme Management </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Productscategory">Product
                                                category </a>
                                        </div>
                                        
                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Onlinesalesorderreport">Online
                                                Sales Order report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesorderassigntostockistreport">Sales
                                                Order assign to stockist report
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Proposalreport">Proposal
                                                report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesquotationreport">Sales
                                                Quotation report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Performainvoicereport">Performa
                                                invoice report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesorderreport">Sales
                                                Order report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesinvoicereport">Sales
                                                Invoice report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/b2bSalesinvoicereport">B2B Sales
                                                Invoice report </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/b2bFocReport">B2B FOC report </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/focReport">FOC report </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/OverallSalesInvoiceReport">Overall Sales Invoice Report</a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/OverallB2bSalesReport">Overall B2B Sales Report</a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/OverallFocReport">Overall FOC report </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/OverallB2BFocReport">Overall B2B FOC report </a>
                                        </div>

                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salescollectionreport">Sales
                                                collection report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesinvoiceduereport">Sales
                                                invoice due report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Salesreturnreport">Sales
                                                return report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Creditdebitnotereport">Credit
                                                & Debit Note report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Movementsalesreport">Movement
                                                PR Details</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/MovementprSummary">Movement
                                                Summary Details</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/MovementtaxinvoiceDetails">Movement
                                                Tax Invoice Details</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Regionalsalesreport">Regional
                                                sales report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/productWiseSaleReport">Product wise sales report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/B2BproductWiseSaleReport">B2B Product wise sales report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/overallProductWiseSaleReport">Overall Product wise sales report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/overallB2BproductWiseSaleReport">Overall B2B Product wise sales report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url();?>salesdistribution/Categoryproductbasedsalesreport">Category
                                                | Product based sales report </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                HR Management
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/hrRecords"
                                                class="dropdown-item" data-key="t-analytics"> HR records</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/jobDescription"
                                                class="dropdown-item" data-key="t-crm">Job Description </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/organisationChart"
                                                class="dropdown-item" data-key="t-crm">Organisation Chart </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/onBoarding"
                                                class="dropdown-item" data-key="t-ecommerce"> Onboarding </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/dependants"
                                                class="dropdown-item" data-key="t-crypto"> Dependants </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/layoffChecklist"
                                                class="dropdown-item" data-key="t-crypto"> Layoff Checklist </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/employees"
                                                class="dropdown-item" data-key="t-crypto"> Employees </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/attendance"
                                                class="dropdown-item" data-key="t-crypto"> Attendance </a>
                                        </div>


                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/deductions"
                                                class="dropdown-item" data-key="t-crypto"> Deductions </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/Insurance"
                                                class="dropdown-item" data-key="t-crypto"> Insurance </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/payslip" class="dropdown-item"
                                                data-key="t-crypto"> Payslip </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/settings"
                                                class="dropdown-item" data-key="t-crypto"> Settings </a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row d-none">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a class="dropdown-item" href="#">Reports </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Stockist
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistlist"
                                                class="dropdown-item" data-key="t-analytics"> Stockist Details </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistsale"
                                                class="dropdown-item" data-key="t-analytics"> Stockist Sales </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistcredits"
                                                class="dropdown-item" data-key="t-analytics"> Stockist Credits </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistdebits"
                                                class="dropdown-item" data-key="t-analytics"> Stockist Debits </a>
                                        </div>



                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/deductions"
                                                class="dropdown-item" data-key="t-crypto"> Deductions </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/Insurance"
                                                class="dropdown-item" data-key="t-crypto"> Insurance </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/payslip" class="dropdown-item"
                                                data-key="t-crypto"> Payslip </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/settings"
                                                class="dropdown-item" data-key="t-crypto"> Settings </a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/ssrreports" class="dropdown-item"
                                                data-key="t-analytics"> SSR Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Movementsalesreports"
                                                class="dropdown-item" data-key="t-analytics"> Movement Sales Reports
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Movementtaxreports"
                                                class="dropdown-item" data-key="t-analytics"> Sales Tax Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistledgerreports"
                                                class="dropdown-item" data-key="t-analytics"> Stockist Ledger Reports
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Stockistfocreports"
                                                class="dropdown-item" data-key="t-analytics"> Stockist FOC Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/Fastmovementreports"
                                                class="dropdown-item" data-key="t-analytics">Stockist BV report </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Stockist/StockistInventory"
                                                class="dropdown-item" data-key="t-analytics">Stockist Inventory
                                                Report</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ktm-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Branch
                            </a>
                            <!-- Mega Menu End -->
                            <div class="dropdown-menu mega-menu p-4">
                                <div class="d-flex flex-column">
                                    <h3 class="megamen_header mt-0">Transactions</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchlist" class="dropdown-item"
                                                data-key="t-analytics"> Branch List </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchsales" class="dropdown-item"
                                                data-key="t-analytics"> Branch Sales </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchcredits" class="dropdown-item"
                                                data-key="t-analytics"> Branch Credits </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchdebits" class="dropdown-item"
                                                data-key="t-analytics"> Branch Debits </a>
                                        </div>



                                    </div>
                                    <h3 class="megamen_header">Settings</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/deductions"
                                                class="dropdown-item" data-key="t-crypto"> Deductions </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/Insurance"
                                                class="dropdown-item" data-key="t-crypto"> Insurance </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/payslip" class="dropdown-item"
                                                data-key="t-crypto"> Payslip </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>hrmanagement/settings"
                                                class="dropdown-item" data-key="t-crypto"> Settings </a>
                                        </div>

                                    </div>
                                    <h3 class="megamen_header">Reports</h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Bsrreports" class="dropdown-item"
                                                data-key="t-analytics"> BSR Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Movementsalesreports"
                                                class="dropdown-item" data-key="t-analytics"> Movement Sales Reports
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Movementtaxreports"
                                                class="dropdown-item" data-key="t-analytics"> Sales Tax Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchledgerreports"
                                                class="dropdown-item" data-key="t-analytics"> Branch Ledger Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchfocreports"
                                                class="dropdown-item" data-key="t-analytics"> Branch FOC Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Fastmovementreports"
                                                class="dropdown-item" data-key="t-analytics">Branch BV Reports </a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <a href="<?php echo base_url();?>Branch/Branchinventory"
                                                class="dropdown-item" data-key="t-analytics">Branch Inventory</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Reports
                            </a>
                            <!-- Dropdown -->
                            <ul class="dropdown-menu" style="
                    flex-direction: column;
                    left: -100% !important;
                    right: 100%;
                    width: 250px;
                  ">
                                <!-- Dropdown Megasubmenu -->

                                <li>
                                    <a class="dropdown-item" href="#">Customer Wise Sale </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Alloy Wise Sale </a>
                                </li>
                                <li><a class="dropdown-item" href="#">Item Wise Sale </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="scroll-right">
            <i class="ri-arrow-right-s-line"></i>

        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>