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
