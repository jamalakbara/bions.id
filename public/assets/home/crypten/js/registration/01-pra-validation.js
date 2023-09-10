var _m = allMessages['en'];

var formValidationStep1Rules = {
    fullname: "required",
    email: {
        required : true,
        email : true
    },
    handphone:{
        required: true,
        digits: true
    },
    investortype: "required",
    nationality: {
        required: function(element){
            return $("input[name='investortype']:checked").val()== "A";
        }
    },
    reference: "required",
    producttype: "required",
    havebniacc: "required"

}

var formValidateionStep1Message = {
    fullname:{
        required:_m.fillField
    },
    email:{
        required:_m.fillField,
        email:_m.validEmail
    },
    handphone:{
        required:_m.fillField,
        digits:_m.fillNumeric,
        number: "Harap masukkan nomor telepon valid"
    },
    investortype:{
        required:_m.fillField
    },
    nationality:{
        required:_m.fillField
    },
    reference:{
        required:_m.fillField
    },
    producttype:{
        required:_m.fillField
    },
    havebniacc:{
        required:_m.fillField
    }
}



