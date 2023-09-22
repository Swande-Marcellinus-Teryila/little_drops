

$("#invest_btn").click(function(){

$.ajax({
        method: "GET",
        url: "../../invest",
        success: (result) => {
       if(result.message){
        alert(result.message);
       }else{
        location.assign('dashboard');
       }

       
        },
        error: (error) => {
            alert('Sorry,something went wrong in fetching data');
        }

    })
});

$("#cashout_btn").click(function(){

    $.ajax({
            method: "GET",
            url: "../../cashout",
            success: (result) => {
           if(result.message){
            alert(result.message);
           }else{
            location.assign('dashboard');
           }
    
            },
            error: (error) => {
                alert('Sorry,something went wrong in fetching data.....');
            }
    
        })
    });

 $(document).ready(function(){
        $.ajax({
                method: "GET",
                url: "../../unfinished-transactions",
                success: (result) => {
                  
                    $("#transactions").html(result)   
                },
                error: (error) => {
                    //alert('Sorry,something went wrong in fetching data.');
                }
        
            });
        });