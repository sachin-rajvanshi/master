$(document).ready( function () {
    $('#for_all').DataTable();
} );
$("#paymentmode_admission").change(function(){
 if($(this).val()=="1")
 {    
   $(".cash_div").show();
 }
 else
 {
  $(".cash_div").hide();
}
});

$("#paymentmode_admission").change(function(){
 if($(this).val()=="2")
 {    
   $(".chq_div").show();
 }
 else
 {
  $(".chq_div").hide();
}
});

$("#paymentmode_admission").change(function(){
 if($(this).val()=="3")
 {    
   $(".net_div").show();
 }
 else
 {
  $(".net_div").hide();
}
});

$("#paymentmode_admission").change(function(){
 if($(this).val()=="4")
 {    
   $(".upi_div").show();
 }
 else
 {
  $(".upi_div").hide();
}
});

$("#paymentmode_admission").change(function(){
 if($(this).val()=="5")
 {    
   $(".paytm_div").show();
 }
 else
 {
  $(".paytm_div").hide();
}
});


new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["2018", "2019", "2020", "2021"],
      datasets: [
        {
          label: "Arts",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "Commerce",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }, {
          label: "Science",
          backgroundColor: "#333",
          data: [300,247,175,334]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'UNIVERSITY EARNINGS (Streams)'
      }
    }
});