function validateForm() {
    var address =document.forms["houseInfoForm"]["address"].value;

    if (address == "") {
      alert("Address must be filled in");
      return false;
    }



    var bedroom =document.forms["houseInfoForm"]["bedroom"].value;

    if (bedroom >25) {
        alert("Do you really have more that 25 bedrooms ?");
        return false;
      }


      var rent =document.forms["houseInfoForm"]["rent"].value;

      if (rent <=0) {
          alert("Rent cannot be 0");
          return false;
        }


        var size =document.forms["houseInfoForm"]["size"].value;

        if (size <=0) {
            alert("Apartment size cannot be 0");
            return false;
          }
  

        return true

  }