
<div id="main">
  <div class="row">
      <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
      <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0">Add New Branch</h5>               
            </div>
          </div>
        </div>
      </div>
    <div class="col s12">
        <div class="container">
          <div class="seaction">
            <div class="row">
              <div class="col s12 m12 l12">
                <div id="Form-advance" class="card card card-default scrollspy">
                  <div class="card-content">
                    <h4 class="card-title">Branch Details</h4>
                      <form class="col s12 card2" id="add_branch">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="branch_name" type="text" name="branch_name">
                            <label for="branch_name">Branch Name</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="branch_add" type="text" name="branch_add">
                            <label for="branch_add">Branch Address</label>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="user_name" type="text" name="branch_user_name">
                            <label for="user_name">User Name</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password" type="password" name="password" >
                            <label for="password">Password</label>
                          </div>
                        </div>

                        <div class="row" >
                          <div class="input-field col m6 s12">
                            <select  name="state" id="state"style="display: block;" tabindex="-1">
                              <option value="" disabled selected>Choose your State</option>
                                
                                <?php foreach ($state as $value):?>
                                   
                                  <option class="option" value="<?php echo $value->id; ?>"><?php echo $value->state; ?></option>
                              
                              <?php endforeach; ?>
                            </select>
                            <label>Select State</label>
                          </div>
                          
                          <div class="input-field col m6 s12">
                            <select name="city" id="city_list" class="mycites" style="display: block;">

                            </select>
                            <label>Select City</label>
                           
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col m6 s12">
                              <input id="pincode" type="text" name="pincode">
                              <label for="pincode">Pin Code</label>
                            </div>

                          <div class="input-field col m6 s12">
                            <input name="date"  type="date" class="datepicker arw" id="dob">
                            <label for="dob">Date</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button id="addbranch" class="btn cyan waves-effect waves-light right add_branch" type="submit" value="addBranch" name="add_branch">Add Branch
                              <i class="material-icons right">send</i>
                            </button>
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
    <!-- END: Page Main-->
<script>
  
$(document).ready(function()
{
  $("#addbranch").on('click',function(e)
  {
    e.preventDefault();
    var branch_name=$('#branch_name').val();
    var branch_add=$('#branch_add').val();
    var user_name=$('#user_name').val();
    var password=$('#password').val();
    var state=$('#state').val();
    var city=$('#city_list').val();
    var pincode=$('#pincode').val();
    var date=$('#dob').val();

    var d = '&branch_name=' + branch_name + '&branch_add=' + branch_add +'&user_name='+ user_name + '&password=' + password + '&state=' + state + '&city=' + city + '&pincode='  + pincode + '&date=' + date;
     
        if ( branch_name==''|| branch_add==''|| user_name==''|| password==''|| state==''|| city==''|| 
        pincode==''|| date=='') 
        {
          show_message("Error","Fields are required","error");

        }

      else
        {

          $.ajax({            
            type : "POST",
            url:"<?php echo base_url('Dashbord/add_branch_data');?>",
            data:d,
            cache:false,
            success:function(data)
            { //alert("helo");
              show_message("Success","Branch Added Successfully","success");

            }

          });
            $("#add_branch").trigger("reset");
        }
      
  });
});
</script>