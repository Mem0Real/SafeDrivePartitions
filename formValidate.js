            function orderthis(id)
            {

                $('#orderModal').modal('show');
                var pType = document.getElementById("productType");
                var model = id;

                if(model==="d")
                {
                    pType.value = "day";
                    pType.style.display = "none";
                    
                }
                else if(model==="h")
                {
                    pType.value = "hybrid";
                    pType.style.display = "none";
                }
                else if(model==="n")
                {
                    pType.value = "night";
                    pType.style.display = "none"
                }
            }
            
            function orderNow()
            {                    
                var fName = document.getElementById("firstName");
                var lName = document.getElementById("lastName");
                var cName = document.getElementById("companyName");
                var cModel = document.getElementById("carModel");
                var oModel = document.getElementById("otherModel");
                var pType = document.getElementById("productType");
                var pNumber = document.getElementById("phoneNumber");
                var order = document.getElementById("placeOrder");
                
                var no = pNumber.value.substr(0, 2);          

                var cError = document.getElementById("company_error");
                var mError = document.getElementById("model_error");
                var pError = document.getElementById("phone_error");

                //Check if first name is empty
                if (fName.value == "")
                {
                    fName.placeholder = "Please enter your first name.";
                    fName.style.borderColor = "red";
                    fName.focus();
                    return false;
                }

                else
                {
                    fName.style.borderColor = "green";
                }

                //Check if last name is empty
                if (lName.value == "")
                {
                    lName.placeholder = "Please enter your last name.";
                    lName.style.borderColor = "red";
                    lName.focus();
                    return false;
                }
                
                else
                {
                    lName.style.borderColor = "green";
                }

                //Check if company name is empty
                if (cName.value == "")
                {
                    cError.style.display = "block";
                    cError.innerHTML = "Please select your company!";
                    cName.style.borderColor = "red";
                    cName.focus();
                    return false;
                }
                
                else
                {                
                    cError.style.display = "none";
                    cName.style.borderColor = "green";
                }

                if(cModel.value == "")
                {
                    mError.style.display = "block";
                    mError.innerHTML = "Please select your car model!"
                    cModel.style.borderColor = "red";
                    cModel.focus();
                    return false;
                }

                else if (cModel.value == "other")
                {
                    mError.style.display = "none";
                    cModel.style.borderColor = "green";

                    if(oModel.value == "")
                    {
                        oModel.placeholder = "Please type in your car model";
                        oModel.style.borderColor = "red";
                        oModel.focus();
                        return false;
                    }
                    else
                    {
                        oModel.style.borderColor = "green";
                    }
                }

                else
                {
                    mError.style.display = "none";
                    cModel.style.borderColor = "green";
                }

                //Check if car Model is empty
                if (pType.value == "")
                {
                    pType.placeholder = "Please enter your last name.";
                    pType.style.borderColor = "red";
                    pType.style.display = "block";
                    pType.focus();
                    return false;
                }

                //Check if car Model is empty
                if (pNumber.value == "")
                {
                    pNumber.placeholder = "Please enter your phone Number.";
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }
                else if((no)!="09")
                {
                    pError.style.display = "block";
                    pError.innerHTML = "Please type in a correct phone number! i.e. 0912345678"
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }

                else if(pNumber.value.length>10||pNumber.value.length<10)
                {
                    pError.style.display = "block";
                    pError.innerHTML = "Please type in your full phone number!"
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }

                else
                {
                    pError.style.display = "none";
                    pNumber.style.borderColor = "green";
                    order.type = "submit";
                }
             
            }

            function model()
            {
                var cModel = document.getElementById("carModel");
                var oModel = document.getElementById("otherModel");

                if(cModel.value === "other")
                {
                    oModel.style.display = "block";
                }
                else
                {
                    oModel.style.display = "none";
                }
            }