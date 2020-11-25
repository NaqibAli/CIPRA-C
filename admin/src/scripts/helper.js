function loadcountries(){
    var opt=``;
$.ajax({
    url:"./countries.json",
    success:(countries)=>{
        countries.forEach(country => {
           opt+=`<option ${(country.nationality=='Somali')?"selected":""}>${country.nationality}</option>`; 
        });
        $(".nationality").html(opt);
    },
    error:(errorm)=>{
        console.log(errorm);
    }
});
}

$("#comp_form").on("change",(e)=>{
   let id=$("#comp_form").val();
   if (id==1) {
    $("#mc-parent").removeClass("d-none");
    $("#company-info").addClass("d-none");
   }
   else if(id==2) {
    $("#mc-parent").addClass("d-none"); 
    $("#company-info").removeClass("d-none");
   }
   else if(id==0){

   }
})
