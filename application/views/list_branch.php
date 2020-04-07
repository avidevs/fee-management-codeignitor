 <!-- BEGIN: Page Main-->
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<div id="main">
  <div class="row">
    
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title mt-0 mb-0">List of Branches</h5>         
          </div>
        </div>
      </div>
    </div>

    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content"style="padding: 15px;">
                  <h4 class="card-title">Branches</h4>
                  <div class="row">
                    <div class="col s12" style="overflow: auto;">
                      <table class="display datatbl" id="mydata" attr="example" style="width: 100%">
                            <thead>
                                <tr >
                                    <th>Sr.No</th>
                                    <th>Reg.Date</th>
                                    <th>Reg.No</th>
                                    <th>Branch Name</th>
                                    <th>User Name</th>
                                    <th>Address</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="datafrombranch">
                              <script>
                                $(document).ready(function()
                                {
                                  show_branchlist(); //call function show all product    
                                    $('#mydata').dataTable(); 

                                    //function show all product
                                    function show_branchlist()
                                    {
                                      $.ajax({                                        
                                        type  : "POST",
                                        url:"<?php echo base_url('Dashbord/getbranchlist');?>",
                                        dataType : 'json',
                                        responsive:true,
                                        success : function(data)
                                        {
                                          var html = '';
                                          var i;
                                          for(i=0; i<data.length; i++)
                                          {
                                         //alert('hello');
                                            if (+data[i].status==1) {
                                              $text='Active';
                                              $class='btn-success btn-sm'
                                            }
                                            else{
                                              $text='Inactive';
                                              $class='btn-danger btn-sm'
                                            }
html += '<tr>'+
        '<td>'+i+'</td>'+
        '<td>'+data[i].reg_date+'</td>'+   
        '<td>'+data[i].branch_code+'</td>'+
        '<td>'+data[i].branch_name+'</td>'+
        '<td>'+data[i].branch_user_name+'</td>'+
        '<td>'+data[i].branch_add+ ',<br>'+data[i].city_name+ ',<br>' +data[i].state+  ',<br>' +data[i].pincode+'</td>'+
        '<td>'+"<button type='button' class='btn "+$class+"'>"+$text+"</button>"+'</td>'+
        '<td style="text-align:right;">'+

    '<a class=" waves-light z-depth-3 gradient-45deg-purple-deep-purple btn-Small action-btn openmodal" data-id="'+data[i].id+'" data-date="'+data[i].reg_date+'" data-branch_code="'+data[i].branch_code+'" data-branch_name="'+data[i].branch_name+'" data-branch_add="'+data[i].branch_add+'"data-branch_user_name="'+data[i].branch_user_name+'" data-state="'+data[i].state_id+'"  data-city="'+data[i].city_name+'" data-citycode="'+data[i].citycode+'" data-pincode="'+data[i].pincode+'" data-status="'+data[i].status+'"  ><i class="material-icons">create</i></a>'+
            
    '<a class=" modal-trigger btn btn-danger btn-sm item_delete  delete_branch" id="'+data[i].id+'"><i class="material-icons">delete_forever</i></a>'+
        '</td>'+
        '</tr>';
                                            }                                           
                                            $('#datafrombranch').html(html);
                                        }           
                                        });
                                        
                                  }
                                });
                              </script>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Reg.Date</th>
                                    <th>Reg.No</th>
                                    <th>Branch Name</th>
                                    <th>User Name</th>
                                    <th>Address</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                    
<script>


$(document).ready(function(){
$('.modal').modal();
    $('body').on('click','.openmodal',function(){
        var id=$(this).data("id");
        var date=$(this).data("date");
        var name=$(this).data("branch_name");
        var add=$(this).data("branch_add");
        var user=$(this).data("branch_user_name");
        var state=$(this).data("state");
        var city=$(this).data("city");
        var citycode=$(this).data("citycode");
        var pin=$(this).data("pincode");
        var status=$(this).data("status");
            //alert(id);
            $('.id').val(id);
            $('.date').val(date);
            $('.branch_name').val(name);
            $('.branch_user_name').val(user);
            $('.branch_add').val(add);
            $('.state').val(state);
            $('.city').html("<option value='"+citycode+"'>"+city+"</option>");
            $('.pincode').val(pin);
            $('.status').val(status);          
            $('#modal1').modal('open');            
    });
});
  </script>

  <!-- End Main Page -->

 <!-- Modal for Edit Deatils -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modal Header</h4>
        <form class="col s12 card2" id="update_branch">
            <div class="row">
              <input type="hidden" name="id" id="id" class="id">
                <div class="input-field col s12">
                    <input id="branch_name" type="text" class="branch_name " name="branch_name" >        
                    <label style="position: unset;" for="branch_name">Branch Name</label>           
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="branch_add" type="text" class="branch_add" name="branch_add">
                    <label  style="position: unset;" for="branch_name">Branch Address</label>
                    </div>                          
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="user_name" type="text" class="branch_user_name" name="branch_user_name">
                <label  style="position: unset;" for="user_name">User Name</label>           
              </div>
            </div>
            <!-- <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" class="password" name="password" >
                <label style="position: unset;"  for="password">Password</label>                          
              </div>
            </div> -->

            <div class="row">
              <div class="input-field col m4 s12">
                <select name="state" class="state" id="state" style="display: block;">
                    <option value="" disabled selected>Choose your State</option>
                    <?php foreach ($state as $value):?>                       
                        <option class="option" value="<?php echo $value->id; ?>"><?php echo $value->state; ?></option>                  
                    <?php endforeach; ?>
                </select>     
                <label style="position: unset;" >Select State</label>                       
              </div> 

              <div class="input-field col m4 s12">
                <select name="city" class="city" id="city_list" class="mycites city" value="" style="display: block;">                             
                </select>     
                <label>Select City</label>              
              </div>

              <div class="input-field col m4 s12">
                <select name="status" class="status" id="status"  style="display: block;">         
                        <option class="option" value="1">Active</option>  
                        <option class="option" value="0">Inactive</option>                   
                </select>     
                    <label>Status</label>              
              </div>
            </div>

            <div class="row">
              <div class="input-field col m6 s12">
                  <input id="pincode" type="text" class="pincode" name="pincode" placeholder="Pin Code">    
                  <label style="position: unset;"  for="pincode">PinCode</label>                         
                </div>
              <div class="input-field col m6 s12">
                <input name="date" type="date" class="datepicker arw date" id="date"  placeholder="Date">
                 <label style="position: unset;"  for="pincode">Date</label>      
              </div>
            </div> 
        </form>                              
    </div>
    <div class="modal-footer">
      <button class="btn cyan waves-effect waves-light right update_branch" type="submit" value="updateBranch" name="update_branch">Update Branch
        <i class="material-icons right">send</i>
      </button>
    </div>
  </div>
 <!-- End Modal for Edit Deatils -->

<script>
    $(document).ready(function()
    {
        $(".update_branch").on('click',function(e)
        {

            e.preventDefault();
            var id=$('#id').val();
            var date=$('#date').val();
            var branch_name=$('#branch_name').val();
            var branch_add=$('#branch_add').val();
            var user_name=$('#user_name').val();
            var state=$('#state').val();
            var city_list=$('#city_list').val();
            var status=$('#status').val();
            var pincode=$('#pincode').val();

 var table=$('#mydata').DataTable();

            var d =  '&id=' + id +   '&branch_name=' + branch_name + '&branch_add=' + branch_add +'&user_name='+ user_name + '&state=' + state + '&city=' + city_list +  '&status=' + status + '&pincode='  + pincode  + '&date=' + date;
     
        if ( branch_name==''|| branch_add==''|| user_name==''||  state==''|| city_list==''|| 
        pincode==''|| date=='') 
        {
          show_message("Error","Fields are required","error");

        }

      else
        {    
          $.ajax({  
            type : "POST",
            url:"<?php echo base_url('Dashbord/update_branch');?>",
            data:d,
            success:function(data)
            {              
              show_message("Success","Branch Updated Successfully","success");
             $('#modal1').modal('close');   
             //table.ajax.reload();
            }

          });
             
        }
        })
    });




 $(document).ready(function()
 {
    $('body').on('click','.delete_branch',function(e)
    {
      var that=this;
          swal
          ({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            icon: 'warning',
            dangerMode: true,
            buttons: 
            {
              cancel: 'No, Please!',
              delete: 'Yes, Delete It'
            }
          })
          .then(function (willDelete)
          {
            if (willDelete) 
            {
             var id=$(that).attr("id");
             //alert(id);
                $.ajax
                ({

                  "url":"<?php echo base_url('Dashbord/delete_branch');?>",
                  "type":"GET",
                  "data":{id:id},
                  "contentType":"false",
                  "cache":"false",
                  success:function(msg)
                  {
                    alert("hiii");                 
                    msg=$.trim(msg);
                    if (msg=="true")
                    {   
                      swal("Poof! Your imaginary file has been deleted!", 
                      {
                      icon: "success",
                      });
                    }
                  }
                });
            } 

            else 
            {
              swal("Your imaginary file is safe", {
                title: 'Cancelled',
                icon: "error",
              });
            }
          });

      });
  });

</script>