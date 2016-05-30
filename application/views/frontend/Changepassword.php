<!-- Alert section For Message-->
<?php  if($this->session->flashdata('message_type')=='success') { ?>

<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
  <strong>
  <?=$this->session->flashdata('message')?>
  </strong> </div>
<?php } if($this->session->flashdata('message_type')=='error') { ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
  <strong>
  <?=$this->session->flashdata('message')?>
  </strong> </div>
<?php } if($this->session->flashdata('category_error')) { ?>
<div class="row" >
  <div class="alert alert-danger" > <strong>
    <?=$this->session->flashdata('category_error')?>
    </strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?> </div>
</div>
<?php }?>
<!-- Alert section End-->
<div class="col-sm-6 col-md-6 col-xs-6 form_content">
<p align="center">Change Password</p>
 <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left"> </div>
                    <div class="title_right"> </div>
                  </div>                  
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <form class="form-horizontal form-label-left" method="post" action="<?=base_url ();?>User/updatepssword" >
                             <div class="item form-group">
                                            <label for="password" class="control-label col-md-3">Old Password</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" name="pass" data-validate-length="" class="form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
 <div class="item form-group">
                                            <label for="password" class="control-label col-md-3">New Password</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="password" type="password" name="password" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
 <div class="item form-group">
                                            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-5">                                
                                <button type="submit" class="btn btn-success" >Change Password</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>
</div>
</body>
 <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>