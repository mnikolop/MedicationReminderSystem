function docFormHash(form, drug, dosage) {
    if (drug.value == ''         || 
          dosage.value == '' ) {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
     // Finally submit the form. 
    form.submit();
    return true;
}
 
function docAddFormHash(form, add_patient) {
     // Check each field has a value
    if (add_patient.value == '' ) {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
     // Finally submit the form. 
    form.submit();
    return true;
}

function docTherapyFormHash(form, name, substance, content, effects){
    
}