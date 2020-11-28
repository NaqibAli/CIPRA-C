// Wait for the DOM to be ready
$(function() {
    $("#loginform").validate({
      
      rules: {
        username: "required",
        password: "required",
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
        
        }
      },
      // Specify validation error messages
      messages: {
        username: "Please enter your username",
        // password: "Please enter your password",
        password: {
          required: "Please provide a password",
          
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });


  });



  //sign up validations

  $(function() {
 
    $("#user-registration").validate({

      rules: {
        name: "required",
        phone: "required",
       
        email: {
          required: true,
          email: true,
        },
        password: {
          required:true,
          minlength: 5
        },
        confirm_password:{
          required:true,
          equalTo: "#password",


        },
      },
      // Specify validation error messages
      messages: {
        confirm_password:{
          required:"Please confirm your password",
          equalTo:"Password must be equal",
        },
      
        
          phone:"Please enter your phone number",
          name:"Please Enter your full name",

      
        password: {
          required: "Please provide a password",
         
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });

  // profile form validations

  $(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#profile").validate({
      // Specify validation rules
      rules: {
        Full_Name: "required",
        nationality: "required",
        Date_of_birth: "required",
        ID_Number: "required",
        Race: "required",
        Phone_Number: "required",
        Country: "required",
        State: "required",
        City: "required",
        Home_Number:"required",
        Office_Number:"required",
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        Full_Name:"please Enter your full name",
        nationality:"please Enter your nationality",
        Date_of_birth:"please Enter your Date of birth",
        ID_Number:"please Enter your Id number",
        Race:"please Enter your Race",
        Phone_Number:"please Enter your phone number",
        Home_Number:"please Enter Home number",
        Office_Number:"please Enter office number",
        Country:"please Enter your country",
        State:"please Enter your state",
        City:"please Enter your city",
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });

  // business Registratiion


  $(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#profile").validate({
      // Specify validation rules
      rules: {
        Full_Name: "required",
        nationality: "required",
        Date_of_birth: "required",
        ID_Number: "required",
        Race: "required",
        Phone_Number: "required",
        Country: "required",
        State: "required",
        City: "required",
        Home_Number:"required",
        Office_Number:"required",
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        company_name:"please Enter your company name",
        comp_type:"please Enter your company Type",
        enit_num:"please Enter your Date of birth",
        cont_num:"please Enter your Id number",
        com_email:"please Enter your Email",
        logo:"please Enter your phone logo",
        file:"please upload file",
        stree_add:"please Enter address",
        city:"please Enter your city",
        state:"please Enter your state",
        passconde:"please Enter your passcode",
        dire_name: "Please enter a Director name",
        id_num: "Please enter a valid id number",
        profession: "Please enter your  profession",
        academy_level: "Please enter academic level",
        director_email: "Please enter a director email address",
        Pass: "Please enter a password",
        conf_pass: "Please confirm password",
        
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });


  // trademark validations

  $(function() {

    $("#profile").validate({
  
      rules: {
        Full_Name: "required",
        nationality: "required",
        Date_of_birth: "required",
        ID_Number: "required",
        Race: "required",
        Phone_Number: "required",
        Country: "required",
        State: "required",
        City: "required",
        Home_Number:"required",
        Office_Number:"required",
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        Full_Name:"please Enter your full name",
        nationality:"please Enter your nationality",
        Date_of_birth:"please Enter your Date of birth",
        ID_Number:"please Enter your Id number",
        Race:"please Enter your Race",
        Phone_Number:"please Enter your phone number",
        Home_Number:"please Enter Home number",
        Office_Number:"please Enter office number",
        Country:"please Enter your country",
        State:"please Enter your state",
        City:"please Enter your city",
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });

  // business Registratiion


  $(function() {

    $("#tradeRegis").validate({
      rules: {
        appli_num: "required",
        applic_type: "required",
        ip_type: "required",
        comp_form: "required",
        mycompanies: "required",
        date: "required",
        comp_name: "required",
        comp_type: "required",
        enty_num: "required",
        cont_num:"required",
        logo:"required",
        file:"required",
        comp_add:"required",
        city:"required",
        state:"required",
        passcode:"required",
        
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        appli_num:"please Enter your company number",
        applic_type:"please Enter your Application Type",
        ip_type:"please Enter your Date of birth",
        comp_form:"please Enter your Id number",
        email:"please Enter your Email",
        logo:"please Enter your phone logo",
        file:"please upload file",
        mycompanies:"please Enter your companies",
        city:"please Enter your city",
        state:"please Enter your state",
        passconde:"please Enter your passcode",
        date: "Please enter a Date ",
        id_num: "Please enter a valid id number",
        comp_name: "Please enter your  company name",
        comp_type: "Please enter company type ",
        enty_num:"Please enter a director enty number",
        cont_num: "Please enter a cantact number",
        comp_add: "Please Enter Address",
        
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });


  //patient validations


  $(function() {

    $("#patentform").validate({
      rules: {
        appli_num: "required",
        applic_type: "required",
        ip_type: "required",
        comp_form: "required",
        mycompanies: "required",
        date: "required",
        comp_name: "required",
        comp_type: "required",
        enty_num: "required",
        cont_num:"required",
        logo:"required",
        file:"required",
        comp_add:"required",
        city:"required",
        state:"required",
        passcode:"required",
        
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        appli_num:"please Enter your company number",
        applic_type:"please Enter your Application Type",
        ip_type:"please Enter your Date of birth",
        comp_form:"please Enter your Id number",
        email:"please Enter your Email",
        logo:"please Enter your phone logo",
        file:"please upload file",
        mycompanies:"please Enter your companies",
        city:"please Enter your city",
        state:"please Enter your state",
        passconde:"please Enter your passcode",
        date: "Please enter a Date ",
        id_num: "Please enter a valid id number",
        comp_name: "Please enter your  company name",
        comp_type: "Please enter company type ",
        enty_num:"Please enter a director enty number",
        cont_num: "Please enter a cantact number",
        comp_add: "Please Enter Address",
        
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });

  //copyRight validations 


  $(function() {

    $("#copyright").validate({
      rules: {
        appli_num: "required",
        applic_type: "required",
        ip_type: "required",
        comp_form: "required",
        mycompanies: "required",
        date: "required",
        comp_name: "required",
        comp_type: "required",
        enty_num: "required",
        cont_num:"required",
        logo:"required",
        file:"required",
        comp_add:"required",
        city:"required",
        state:"required",
        passcode:"required",
        
        email: {
          required: true,
          email: true
        }, 
      },
      messages: {
        appli_num:"please Enter your company number",
        applic_type:"please Enter your Application Type",
        ip_type:"please Enter your Date of birth",
        comp_form:"please Enter your Id number",
        email:"please Enter your Email",
        logo:"please Enter your phone logo",
        file:"please upload file",
        mycompanies:"please Enter your companies",
        city:"please Enter your city",
        state:"please Enter your state",
        passconde:"please Enter your passcode",
        date: "Please enter a Date ",
        id_num: "Please enter a valid id number",
        comp_name: "Please enter your  company name",
        comp_type: "Please enter company type ",
        enty_num:"Please enter a director enty number",
        cont_num: "Please enter a cantact number",
        comp_add: "Please Enter Address",
        
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });

    
  });