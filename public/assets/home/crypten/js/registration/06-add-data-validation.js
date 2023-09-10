var formValidationApp = {
	addresspstreet: {
        requiredIf: 'addresspsame',
		isInclude: 'addresspstreet'
   	},
   	addressphousing: {
        requiredIf: 'addresspsame',
		isInclude: 'addressphousing'
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
        requiredIf: 'occupationaltype',
		isInclude: 'occupationalworkingplace'
   	},
   	occupationaljobposition: {
        requiredIf: 'occupationaltype'
   	},
   	occupationallinebusiness: {
        requiredIf: 'occupationaltype'
   	},
   	occupationalstreet: {
   		requiredIf: 'occupationaltype',
		isInclude: 'occupationalstreet'
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
   	correspondencetype: 'required'
}

var formValidationAppMessage = {
	occupationalworkingplace: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
	occupationalstreet: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
	addresspstreet: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
	addressphousing: {
		isInclude: _m.carIsInclude(' & \' - { } , ')
   	},
}
