
$("#merge").click(function(){

    $.ajax({
            method: "GET",
            url: "../../admin/merge-users",
            success: (result) => {
          // if(result.message){
            alert(result.message);
        //    }else{
        //     location.assign('dashboard');
        //    }
    
            },
            error: (error) => {
                alert('Sorry,something went wrong in fetching data.....');
            }
    
        })
    });