<?php
    include 'includes/header-user.php';
    include 'includes/head.php';
    
?>
<link rel="stylesheet" href="css/containerj.css">
<div class="entrep-view hm-black-strong">
    <div class="half-bg-img flex-center">
        <ul class="animated fadeInUp">
            <li><h1 class="h1-responsive">Great things come from small beginnings.</h1></li>

        </ul>
    </div>
</div>
<section id="services" class="sec-services">
  <div class="container-fluid m-r-50 m-l-50">
    <div class="row">
      <div class="col-sm-4">
        <img src="img/icons/entrep-create.png " class="img-responsive"  width="170" height="170">
        <h2 class="h3">Call for investment</h2><!-- &amp; -->
        <p>We match Investors to their preferred type of MSME's.</p>
      </div>
      <div class="col-sm-4">
        <img src="img/icons/entrep-raise.png " class="img-responsive" width="170" height="170">
        <h2 class="h3">Get Funded</h2>
        <p>Raise amount needed thru investment pooling.</p>
      </div>
      <div class="col-sm-4">
        <img src="img/icons/entrep-grow.png " class="img-responsive"  width="170" height="170">
        <h2 class="h3">Grow</h2>
        <p>It is time to expand to your business. Venture with us today!</p>
      </div>
    </div>

    <div class="row m-t-100">
      <div class="getstarted p-20"><a class="btn_getstarted" href="register-entreprenuer">Get Started</a></div>
    </div>
    </div>
  </div>
</section>


<div class="container-fluid m-r-50 m-l-50">
<div class="section  slider-content">
  <div class="row m-t-50 ">
    <div class="col-lg-9 slider">
        <h6 id="amount" class="m-t-20 m-b-20 m-l-20"></h6>
      <div id="slider-1" class="m-l-20"></div>
    </div>
    <div class="col-lg-3 slider">
      <h6  id="year" class="m-t-20 m-b-20 m-r-20"></h6>
      <div id="slider-2" class="m-r-20"></div>
    </div>
  </div>
</div>
<div class="row ">
  <div class="col-lg-12">
  <div class="table-responsive m-t-30">   
    <table id="" class="table table-bordered  table-condensed">
      <tr>
        <th colspan="8" class="text-center bg-mycolor font-white">LIABILITY : Payment of Principal is on  OR within the last day of the term.</th>
      </tr>
      <tr>
        <th colspan="8" class="text-center bg-color-F7FAFA">Interest Computation for 1 month.</th>
      </tr>
      <tr>
        <th colspan="2" class="text-center bg-color-F7FAFA">VenturePal</th>
        <th colspan="2" class="text-center bg-color-F7FAFA">Government</th>
        <th colspan="2" class="text-center bg-color-F7FAFA">Bank Loan</th>
        <th colspan="2" class="text-center bg-color-F7FAFA">Bombay</th>
      </tr>
      <tr>
        <th class="text-center">Interest</th>
        <th class="text-center">Interest @ 2%</th>
        <th class="text-center">Interest</th>
        <th class="text-center">Interest @ 3%</th>
        <th class="text-center">Interest</th>
        <th class="text-center">Interest @ 13.9%</th>
        <th class="text-center">Interest</th>
        <th class="text-center">Interest @ 20%</th>
      </tr>
      <tr>
        <td class="text-center ">2%</td>
        <td class="text-center font-default-dark" id="venturepal-interest"></td>
        <td class="text-center">3%</td>
        <td class="text-center font-default-dark" id="government-interest"></td>
        <td class="text-center" >13.9%</td>
        <td class="text-center font-default-dark" id="bank-interest"></td>
        <td class="text-center" >20%</td>
        <td id="bombay-interest" class="text-center font-default-dark"></td>
      </tr>
    </table>
  </div>

   <div class="table-responsive m-t-30">   
    <table id="" class="table table-bordered  table-condensed">
      <tr>
        <th colspan="8" class="text-center bg-mycolor font-white" id="manyyears"></th>
      </tr>
      <tr>
        <th class="text-center bg-color-F7FAFA">Pricipal</th>
        <th class="text-center bg-color-F7FAFA">VenturePal</th>
        <th class="text-center bg-color-F7FAFA">Government</th>
        <th class="text-center bg-color-F7FAFA">Bank Loan</th>
        <th class="text-center bg-color-F7FAFA">Bombay</th>
      </tr>
      <tr>
        <td class="text-center font-default-dark" id="principal"></td>
        <td class="text-center font-default-dark" id="vp-principal"></td>
        <td class="text-center font-default-dark" id="gov-principal"></td>
        <td class="text-center font-default-dark" id="bank-principal"></td>
        <td class="text-center font-default-dark" id="bombay-principal"></td>
      </tr>
      <tr>
        <td class="text-center font-default-dark" id="total"></td>
        <td class="text-center font-default-dark" id="vp_total"></td>
        <td class="text-center font-default-dark" id="gov_total"></td>
        <td class="text-center font-default-dark" id="bank_total"></td>
        <td class="text-center font-default-dark" id="bombay_total"></td>
        
      </tr>
    </table>
  </div>
  </div>
</div>
</div>

<div class="container-fluid bg-color-F7FAFA p-15 register-container">
  <div class="row">
      <div class="container login-content">
      <h1 id="confirm"></h1>
<p class="text-center"><img class="img-responsive" id="nav-logo" src="img/official2.png" width="240" height="60"></p>
    <h1 class="title"></h1>
    
    <form class="register-form" id="registerForm" method="post">
      <div class="via-email">
        <span> Entreprenuer registration</span>
      </div>
      <div class="email">
        <input type="text" hidden class="inputText" name="type"  value="2" />
      </div>
      <div class="email">
        <input type="text" class="inputText" id="username" name="username" placeholder="Username" />
      </div>
      <div class="email">
        <input type="email" class="inputText" id="email" name="email" placeholder="Email" />
      </div>
      <div class="email">
        <input type="password"  class="inputText" id="rpassword" name="rpassword" placeholder="Password" />
      </div>

      <div class="password">
        <input type="password"  class="inputText" id="repassword" name="repassword" placeholder="Repeat your password" />
      </div>

        <input type="submit" class="register-buttton btnR btn_common" id="btnLogin" value="Sign up" name="btnLogin">
        <p>By signing up, you certify that you are of Philippines legal age (18 years old and above) and agree to our <a href="" data-toggle="modal" data-target="#termsModal">terms & conditions.</a></p>
        <span>
          <div class="via-email">
            <span>Already have an account? <a href="login">Log in</a></span>
          </div>
        </span>
         
      </form>
      </div>
</div>
</div>

<script>
 var amount = 10000, year = 1, principal,
 p_vp, p_gov, p_bank, p_bombay,
 i_vp, i_gov, i_bank, i_bombay,
 tot_vp, tot_gov, tot_bank, tot_bombay;
         $(function() {
            $( "#slider-1" ).slider({
              min: 500,
              max: 100000,
              step: 500,
              slide : function(event, ui){
                amount = ui.value;
                changeValue(amount, year);
              }
            });
          
            
            $( "#slider-2" ).slider({ 
              min: 1,
              max: 5,
              step: 1,
              slide : function(event, ui){
                year = ui.value;
                changeValue(amount, year);
              }
            });
            amount =  $("#slider-1").slider( "values", 0 );
            year =  $("#slider-2").slider( "values", 0 );
            changeValue(amount, year);

         });

         function changeValue(amount, year){

            i_vp = amount * 0.02;
            i_gov = amount * 0.03; 
            i_bank = amount * 0.139;
            i_bombay = amount * 0.2;

            p_vp = (year * 12) * i_vp;
            p_gov = (year * 12) *i_gov;
            p_bank = (year * 12) *i_bank;
            p_bombay = (year * 12) * i_bombay;


            tot_vp = amount + p_vp;
            tot_gov = amount + p_gov;
            tot_bank = amount + p_bank;
            tot_bombay = amount + p_bombay;

            
            $('#total').html('Total for  '+year+' year/s / '+(year*12)+' months');
            $( "#principal" ).html(' P ' + amount.toFixed(2));
            $( "#amount" ).html('Investment Amount: P ' + numberWithCommas(amount.toFixed(2)));
            $('#year').html('Enter Ideal Term(years): '+year);
            $('#manyyears').html('Term in '+year+' year/s ('+(year*12)+' months)');

            $( "#vp_total" ).html(' P ' + numberWithCommas(tot_vp.toFixed(2)));
            $( "#gov_total" ).html(' P ' + numberWithCommas(tot_gov.toFixed(2)));
            $( "#bank_total" ).html(' P ' + numberWithCommas(tot_bank.toFixed(2)));
            $( "#bombay_total" ).html(' P ' + numberWithCommas(tot_bombay.toFixed(2)));

            $( "#vp-principal" ).html(' P ' + numberWithCommas(p_vp.toFixed(2)));
            $( "#gov-principal" ).html(' P ' + numberWithCommas(p_gov.toFixed(2)));
            $( "#bank-principal" ).html(' P ' + numberWithCommas(p_bank.toFixed(2)));
            $( "#bombay-principal" ).html(' P ' + numberWithCommas(p_bombay.toFixed(2)));

            $( "#principal" ).html(' P ' + numberWithCommas(amount.toFixed(2)));
            $( "#venturepal-interest" ).html('P '+numberWithCommas(i_vp.toFixed(2)));
            $( "#government-interest" ).html('P '+numberWithCommas(i_gov.toFixed(2)));
            $( "#bank-interest" ).html('P '+numberWithCommas(i_bank.toFixed(2)));
            $( "#bombay-interest" ).html('P '+numberWithCommas(i_bombay.toFixed(2)));
            $( "#year" ).html('Enter Ideal Term(years): ' + year);
         }


        function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      </script>
<?php
    include 'includes/footer.php';
?>