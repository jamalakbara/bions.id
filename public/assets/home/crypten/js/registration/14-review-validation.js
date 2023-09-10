var formValidationApp = {
    acctype: "required",
    onlinetype: "required",
    branch: {
        required: function(element){
            return $("input[name='onlinetype']:checked").val()== "H";
        }
 },



 identitynum: {
     "required" : true,
     "fixLength" : 16,
     "isInclude" : "identitynum"
 },
 fullname: "required",
 birthplace: "required",
 birthday: {
     "required" : true,
     "isValidDateFormat": true,
     "isValidDate" : true,
     "dateBirthday" : true
 },
 gender: "required",
 addressstreet: {
     "required" : true,
     isInclude: 'addressstreet'
 },
 addresshousing: {
     "required" : true,
     isInclude: 'addresshousing'
 },
 addressvillage: "required",
 addresssubdistrict: "required",
 addresscity: "required",
 addressprovince: "required",
 religion: "required",
 maritalstatus: "required",
 occupationaltype: "required",
 occupationaltypeother: {
     required: function(element){
         return $("select[name='occupationaltype']").val()== "OTHERS";
     }
 },
 identityissuedplace: "required",
 identityissueddate: {
     "required" : true,
     "isValidDateFormat": true,
     "isValidDate" : true,
     "notFuture" : true
 },
 addresspostalcode: "required",
 educationalbg: "required",
 mothername: "required",
 spousename: {
     required: function(element){
         return $("select[name='maritalstatus']").val()== "M";
     }
 },



 addresspstreet: {
     requiredIf: 'addresspsame'
    },
    addressphousing: {
     requiredIf: 'addresspsame'
    },
 addresspvillage: {
     requiredIf: 'addresspsame'
    },
    addresspsubdistrict: {
     requiredIf: 'addresspsame'
    },
    addresspcity: {
     requiredIf: 'addresspsame'
    },
    addresspprovince: {
     requiredIf: 'addresspsame'
    },
    addresspcountry: {
     requiredIf: 'addresspsame'
    },
    addressppostalcode: {
     requiredIf: 'addresspsame'
    },
    addressphonecountry: 'required',
    addressphonearea: {
        requiredIf: 'addressphonecountry'
    },
    phone: {
        required: true,
        isValidPhone: true,
     digits: true
    },
    occupationalworkingplace: {
     requiredIf: 'occupationaltype'
    },
    occupationaljobposition: {
     requiredIf: 'occupationaltype'
    },
    occupationallinebusiness: {
     requiredIf: 'occupationaltype'
    },
    occupationalstreet: {
        requiredIf: 'occupationaltype'
    },
 // occupationalvillage: {
 //     requiredIf: 'occupationaltype'
 // },
 // occupationalsubdistrict: {
 //     requiredIf: 'occupationaltype'
 // },
    // occupationalcity: {
    // 	requiredIf: 'occupationaltype'
    // },
    // occupationalprovince: {
    // 	requiredIf: 'occupationaltype'
    // },
    occupationalcountry: {
        requiredIf: 'occupationaltype'
    },
    occupationalpostalcode: {
     requiredIf: 'occupationaltype'
 },
    correspondencetype: 'required',


    taxidnum: {
      requiredIf: 'occupationaltype',
      fixLengthIf: 'occupationaltype',
      digits: true,
      isInclude: 'taxidnum'
 },
 occupationalsourceofincome: 'required',
 occupationalsourceofincomeother: {
     requiredIf: 'occupationalsourceofincome',
 },
 occupationalmonthlyincome: 'required',
 occupationalannualincome: 'required',
 bankname: 'required',
 bankbeneficiaryaccount: {
     required: true,
     fixLengthIf: 'bankname',
     digits: true
 },
 bankbeneficiaryname: 'required'
}

var formValidationAppMessage = {
 taxidnum: {
     fixLengthIf: _m.fixLength(15),
     isInclude: _m.carIsInclude(' & \' - { } , ')
 },
 bankbeneficiaryaccount: {
     fixLengthIf: _m.fixLength(10)
 },
 identitynum: {
     number: "Harap masukkan NIK valid",
     isInclude: _m.carIsInclude(' & \' - { } , ')
    },
 addressstreet: {
     isInclude: _m.carIsInclude(' & \' - { } , ')
    },
 addresshousing: {
     isInclude: _m.carIsInclude(' & \' - { } , ')
    },
}

