





        $("#i_have_paid_btn").click(function(){
           
                $.ajax({
                        method: "GET",
                        url: "../../i-have-paid",
                        success: (result) => {
                            $(document).ready(function(){
                                $.ajax({
                                        method: "GET",
                                        url: "../../unfinished-transactions",
                                        success: (result) => {
                                          
                                            $("#transactions").html(result)   
                                        },
                                        error: (error) => {
                                           // alert('Sorry,something went wrong in fetching data.');
                                        }
                                
                                    });
                                });
                        },
                        error: (error) => {
                           // alert('Sorry,something went wrong in fetching data.');
                        }
                
                    })
                });

            function confirmPayment(member_id){
                    
                    $.ajax({
                            method: "GET",
                            url: "../../confirm-payment/"+member_id,
                            success: (result) => {
                                $(document).ready(function(){
                                    $.ajax({
                                            method: "GET",
                                            url: "../../unfinished-transactions",
                                            success: (result) => {
                                              
                                                $("#transactions").html(result)   
                                            },
                                            error: (error) => {
                                               // alert('Sorry,something went wrong in fetching data.');
                                              }            
                                        });
                                    });
                            },
                            error: (error) => {
                               // alert('Sorry,something went wrong in fetching data.');
                            }
                    
})
                    }



                    function cantPay(user_id){
                    
                        $.ajax({
                                method: "get",
                                url: "../../users/"+user_id,
                                success: (result) => {
                                  
                                    alert(result.message); 
                                    window.location.assign('register');  
                                },
                                error: (error) => {
                                   // alert('Sorry,something went wrong in fetching data.');
                                }
                        
    })
                        }                    
