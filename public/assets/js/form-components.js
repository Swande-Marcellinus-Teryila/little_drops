
// $.ajax({
//         method: "GET",
//         url: "../../sex-component",
//         success: (result) => {
//     	$("#sex").html(result);
//         },
//         error: (error) => {
//             alert('Sorry,something went wrong in fetching data.');
//         }

//     })

//     $.ajax({
//         method: "GET",
//         url: "../../marital_status-component",
//         success: (result) => {
//     	$("#marital_status").html(result);
//         },
//         error: (error) => {
//         alert('Sorry,something went wrong in fetching data.');
//         }

    // })

    // $.ajax({
    //     method: "GET",
    //     url: "../../homecell-component",
    //     success: (result) => {
    // 	$("#homecell").html(result);
    //     },
    //     error: (error) => {
    //     alert('Sorry,something went wrong in fetching data.');
    //     }

    // })
    // $.ajax({
    //     method: "GET",
    //     url: "../../department-component",
    //     success: (result) => {
    // 	$("#department").html(result);
    //     },
    //     error: (error) => {
    //     alert('Sorry,something went wrong in fetching data.');
    //     }

    // })

    const stateChange=(state_id)=>{
        $.ajax({
            method: "get",
            data:state_id,
            url: `../../lga-component/${state_id}`,
            success: (result) => {
                console.log(result)
              
           $("#lga").html(result);
          
            },
            error: (error) => {
            console.log('Sorry,something went wrong in fetching local governments.');
            }
    
        })
    }
