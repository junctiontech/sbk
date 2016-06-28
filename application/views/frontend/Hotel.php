<!--<div class="header_bottom_left"> 
<!-- <script src="https://www.hotelscombined.com/SearchBox/343862"></script>
<script src="https://brands.datahc.com/?a_aid=160284&brandid=482894&languageCode=EN"></script> 
		<iframe style="height: 1100px;
    width: 1249px;" src="https://brands.datahc.com/?a_aid=160284&brandid=482894&languageCode=EN">
  <p>Your browser does not support iframes.</p>
</iframe>
		  <div class="clear"></div>
		</div>
			
	  <div class="clear"></div>
  </div>	
</div>-->
	<div class="clear"></div>
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="hotel_panal">
 <form method="post" class="form-horizontal form-label-left">
 <div class=" ">
              <div class="hotel"style="padding-bottom: 25px;">
                <h2>Search Hotal</h2>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Where?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" class="form-control" value=" ">
                </div>
              </div>
<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 hotel">Check In</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Check In" aria-describedby="inputSuccess2Status">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 hotel">Check Out</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Check Out" aria-describedby="inputSuccess2Status">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Guests?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <select class="form-control" name="Status">
<option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 <option value="6">6</option>
 <option value="7">7</option>
 <option value="8">8</option>
 <option value="9">9</option>
<option value="10">10</option>
</select>
                </div>
              </div>
			     <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Rooms?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <select class="form-control" name="Status">
<option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 <option value="6">6</option>
 <option value="7">7</option>
 <option value="8">8</option>
 <option value="9">9</option>
<option value="10">10</option>
</select>
                </div>
              </div>

				
				 
              <button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
            	 </div>
</form>
</div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12"> 
<div class="col-md-2 sc_hotel"><img style="width: 111px; height: 111px;" src="<?=base_url();?>frontend/images/preview-img3.jpg"></div>
<div class="col-md-10 sc_hotel"><h2><a href="#">flight Name </a><small>Star</small></h2>
<div><p>Hotel Address</p></div>
<div class="col-md-8  ">
<table style="width:100%">
<tr>
<td><a href="#"><p>roms</p><p>rooms</p></a></td>
<td style="text-align:right"><p>4000</p><small>1 rooms left</small></td>
</tr>
<tr>
<td><a href="#"><p>roms</p><p>rooms</p></a></td>
<td style="text-align:right"><p>4000</p><small>1 rooms left</small></td>
</tr>
</table>
</div>
<div class="col-md-4 hc_sri_result_promotedDeal"><p class="price">4500</P>
<small>for time</small><br>
<button type="submit" class="btn btn-success">View Hotel</button>
</div>
<div class="clear"></div>
</div> 
</div>
</div><div class="clear"></div>
<script>
        	
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

		
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
 
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
		
		<!-- enable return trip -->
		 function enableButton2() {
            document.getElementById("button2").disabled = false;
        }
    </script>
