<?php
      session_start();
      if(!isset($_SESSION['islogin'])){
          header('location:index');
    }
    include 'includes/head.php';
    include 'includes/navdefault.php';
?>
<style type="text/css">
    
    .act:hover{
        background: #EEEEEE;
    }
    div.c {
        line-height: 15px;
        font-size: 13px !important;
        margin-bottom: 20px;
    }
</style>
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
<link href="css/material-dashboard2.css" rel="stylesheet"/>

<div class="container-fluid" style="margin-top: 100px">

    <div class="col-lg-3">
        <div style=" background-color:white; height:100%; position:fixed; right:0; top : 0;width: 25%;">
            <div class="m-t-100">
                <h4 class="text-center"><i class="material-icons">notifications</i>Activity Logs</h4>
                <div id="">
                  <div class="container-fluid" id="logs" style="overflow-y: scroll; height: 550px;">
        <!--             <div class="row act" style=" padding: 5px; border-bottom: 1px solid #EEEEEE; border-top: 1px solid #EEEEEE; ">
                      <div class="col-3"><img src="img/ballon.jpg" width="60" height="60"></div>
                      <div class="col-8">
                        <div class="row m-r-10">
                            <small> asdf asdf asd fdasf asdf as fas faf asd fasdfasdfasdf asdf asdf</small>
                        </div>
                        <div class="row" style="position: absolute; bottom: 0;">
                                <small style="color: #999999">February 27, 2018 </small>
                        </div>
                      </div>
                     </div> -->


                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons"><span>&#8369;</span></i>
                </div>
                <div class="card-content">
                    <p class="category">Total raised amount</p>
                    <h3 class="title" id="total_raised_amount"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">event_busy</i>
                </div>
                <div class="card-content">
                    <p class="category">MSME that will close in 7 days</p>
                    <h3 class="title" id="countClose"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">content_copy</i>
                </div>
                <div class="card-content">
                    <p class="category">Total Pending Investment</p>
                    <h3 class="title" id="totalPending"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i> <a href="#pablo">Angelica</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">content_paste</i>
                </div>
                <div class="card-content">
                    <p class="category">Total Deal Investment</p>
                    <h3 class="title" id="totalnvestment"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i> <a href="#pablo">Angelica</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">Revenue</p>
                    <h3 class="title">$34,245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">people</i>
                </div>
                <div class="card-content">
                    <p class="category">Registered Entrepreneur</p>
                    <h3 class="title" id="totalEntrep"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">supervisor_account</i>
                </div>
                <div class="card-content">
                    <p class="category">Registered Investor</p>
                    <h3 class="title" id="totalInvestor"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">MSME Accounts</p>
                    <h3 class="title" id="totalmsme"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="card-content">
                    <p class="category">Entrepreneur Payables</p>
                    <h3 class="title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                   <i class="material-icons">account_balance</i>
                </div>
                <div class="card-content">
                    <p class="category">Investors Payouts</p>
                    <h3 class="title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">trending_up</i>
                </div>
                <div class="card-content">
                    <p class="category">MSME's Raised 100%</p>
                    <h3 class="title" id="msmsComplete"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">trending_flat</i>
                </div>
                <div class="card-content">
                    <p class="category">MSME's Raised less than 100% </p>
                    <h3 class="title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

<script type="text/javascript" src="script/dashboard3.js"></script>
<script type="text/javascript" src="script/notification.js"></script>
<?php 
     include 'includes/footer.php'; 
?>

