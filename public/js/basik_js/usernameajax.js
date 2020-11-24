

$('.usernamefield').parsley();

    window.ParsleyValidator.addValidator('usernamevalidator', {
      validateString: function(value)
      { 

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var z = $.ajax({
                    /* the route pointing to the post function */
                    url: '/postajax',
                    type: 'POST',
                    async: false,
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".usernamefield").val()},
                    // dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 


                        


                    }
                }); 
        console.log(z.responseText);

        if(z.responseText==0){
            return false;
        }
        else{
            return true;
        }
        
      },
          messages: {
            en: 'This username is taken',
            
          }
    });





















// var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

//             $(".usernamefield").keyup(function(){

            	
//                 $.ajax({
//                     /* the route pointing to the post function */
//                     url: '/postajax',
//                     type: 'POST',
//                     /* send the csrf-token and the input to the controller */
//                     data: {_token: CSRF_TOKEN, message:$(".usernamefield").val()},
//                     // dataType: 'JSON',
//                     /* remind that 'data' is the response of the AjaxController */
//                     success: function (data) { 
//                         // $(".email_error").append(data.msg); 

//                         // $(".email_error").show();
//                         // console.log(data); 
//                         $(".username_existence").empty();
//                         $(".username_existence").append(data);

//                         if(data==0){
//                         	$(".username_existence").empty();
//                         	$(".username_existence").append("This name is already taken");
//                         }
//                         else{
//                         	$(".username_existence").empty();
//                         	$(".username_existence").append("This name is available. Take it buddy!");
//                         }
//                     }
//                 }); 
//             });
