
// var jQueryScript = document.createElement('script');  
// jQueryScript.setAttribute('src','https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet');
// document.head.appendChild(jQueryScript);

// for login varification
  $(document).ready(function()
    {
      $(".login-form").on('submit',function(e)
        {
      
            var a=new FormData(this);
            a.append('login','login');
            e.preventDefault();
            $.ajax
              ({
                type:'POST',
                url:'index/login',
                data:a,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                    $('.login').attr("disabled","disabled");
                },
                success:function(msg)
                {
                    msg=$.trim(msg);
                    if (msg=="OK") 
                    {
                      show_message("Success","Login success","success");
                      //window.location="Dashbord/home.php";
                      window.location="Dashbord/home";
                    }
                    else
                    {
                      show_message("ERROR",msg,"error");
                      $('.login').attr("disabled",false);
                    }
                    //window.location="Dashbord/home";
                }
                });
        });
    });

function show_message(title,text,mode)
{
  swal(title,text,mode);
}


 $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            // alert('hello!');
            if(stateID) {
             // alert('hello!');
                $.ajax({
                    type: "POST",
                    url: "getcity",
                    data:'stateid='+stateID,
                    dataType: "json",
                    success:function(data) { 
                    //console.log(data) ;                    
                     $('select[name="city"]').empty();
                      $.each(data, function($query, $row) {
                       $('select[name="city"]').append('<option class="option" value="'+ $row.city_code +'">'+ $row.city_name +'</option>');
                      });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });


function getcourse(val){
  //alert('hello!')
  $.ajax({
    type:"POST",
    url:"getajax.php",
    data:'course_id='+val,
    success: function(data)
    {
      
      $("#course_list").html(data);

      //alert(html(data));
    }
  });
}

