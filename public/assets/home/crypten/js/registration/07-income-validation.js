var formValidationApp = {
    taxidnum: {
         requiredIf: 'occupationaltype',
         fixLengthIf: 'occupationaltype',
         validTaxId: true,
         digits: true,
         isInclude: 'taxidnum'
    },
    occupationalsourceofincome: 'required',
    occupationalsourceofincomeother: {
        requiredIf: 'occupationalsourceofincome',
        isInclude: 'occupationalsourceofincomeother'
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
        validTaxId: "Harap masukkan NPWP valid",
        isInclude: _m.carIsInclude(' & \' - { } , ')
    },
    bankbeneficiaryaccount: {
        fixLengthIf: _m.fixLength(10)
    },
    occupationalsourceofincomeother: {
        isInclude: _m.carIsInclude(' selain alphabet ')
        
    }
}
