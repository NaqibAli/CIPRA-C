$("#searchCompany").on("keyup",(e)=>{
   let cards="";
    if (e.key === "Enter") {
        
        var postdata={
            method:"searchCompany",
            q:$("#searchCompany").val()
        }
        $.ajax({
            url: "./api/api.php", 
            method:"POST",
            dataType:"Json",
            data:postdata,
            success: function(result){
             let status=result.status;
             let data =result.data;

             if(status){
                 data.forEach(company => {
                  cards+=`
                  <div class="col-lg-3 col-md-3 m-1 card">
					<div class="card-body">
						<img src="./uploads/logos/${company.logo}" class="d-company-logo ml-auto" alt="">
						<div class="text-content">
							<h5 class="my-3 text-capitalize">Company: ${company.name}</h5>
						<p class="text-secondary">ID: ${company.cid}</p>
						<p class="text-secondary text-capitalize">Location: ${company.location}</p>
						</div>

						<button class="btn btn-outline-primary my-2  btn-lg btn-rounded"><i class="dw dw-message"></i>  More Info</button>
					</div>
				</div>
                  `;   
                 });
             }
             else{
                 cards+=`<div class="col-12 text-center"><h4>${data}</h4></div>`;
             }
             $("#search-result").html(cards);
          
          }});
    }

});