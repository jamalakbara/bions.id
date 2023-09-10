var formValidationApp = {
    identitynum: {
        "required" : true,
        "fixLength" : 16,
        "digits": true,
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
    identityexpireddate: {
        "requiredIf" : "identityexpireddate_lifetime",
        "isValidDateFormatIf": "identityexpireddate_lifetime",
        "isValidDateIf" : "identityexpireddate_lifetime",
        "notPastIf" : "identityexpireddate_lifetime"
    },
    addresspostalcode: "required",
    educationalbg: "required",
    mothername: "required",
    spousename: {
        required: function(element){
            return $("select[name='maritalstatus']").val()== "M";
        }
    }

}

var formValidationAppMessage = {
    addressstreet: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
    addresshousing: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
    identitynum: {
		number: "Harap masukkan NIK valid",
        isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
}
