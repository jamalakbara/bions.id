var url_lookup = base_url + "registration/baseregistration/lookup";
var url_lookuppostcode =
	base_url + "registration/baseregistration/lookupPostcode";
var formValidation_errorElement = "span";
var formValidation_errorClass = "invalid";
var formValidation_highlight = function (element, errorClass, validClass) {
	$(element).addClass(errorClass).removeClass(validClass);
};
var formValidation_unhighlight = function (element, errorClass, validClass) {
	$(element).removeClass(errorClass);
};
var formValidation_invalidHandler = function (form, validator) {
	var errors = validator.numberOfInvalids();
	if (errors) {
		validator.errorList[0].element.focus();
	}
};
var formValidation_errorPlacement = function (error, element) {
	if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
		error.prependTo(element.closest(".component-group"));
	} else {
		error.insertAfter(element);
	}
};

jQuery.ajaxSetup({
	beforeSend: function () {
		$("#loading").show();
	},
	complete: function () {
		$("#loading").hide();
	},
	success: function () {},
	error: function (xhr, textStatus, errorThrown) {
		//var msg = textStatus + ' : ' + errorThrown;
		console.log(xhr);
		console.log(errorThrown);
		var msg =
			xhr.status +
			"-" +
			xhr.statusText +
			"<br/>" +
			textStatus +
			" [" +
			errorThrown +
			"]" +
			" <br/><br/>[" +
			xhr.responseText +
			"]";
		errorToast(msg);
	},
});

function setupVueApp() {
	var app = null;
	app = new Vue({
		el: "#app",
		data: {
			vform: store.vform,
		},
	});
	setupSaveWorker();
}

var saveToLocalStorage = function () {
	try {
		localStorage.setItem("bnis-register", JSON.stringify(store.vform));
	} catch (e) {
		console.log({ saveToLocalStorage: e });
	}
};

function setupSaveWorker() {
	try {
		_saveInterval = setInterval(saveToLocalStorage, 3000);
	} catch (e) {
		if (e == QUOTA_EXCEEDED_ERR) {
			alert("Quota exceeded!");
		}
	}
}

function sleep(ms) {
	return new Promise(function (resolve) {
		setTimeout(resolve, ms);
	});
}

function errorToast(err) {
	var toastHTML = "<div>" + err + "</div>";
	M.toast({ html: toastHTML, displayLength: 7000, classes: "toast-error" });
}
function updateDropdownValue(id, value) {
	store.vform[id] = value;

	var el_form = $("select[name=" + id + "]");
	// el_form.val(value).trigger('change')

	el_form.val(value);
	el_form.formSelect();
}

var createOptions = function (rows, selectorField) {
	var opts = "";

	if (selectorField.find("option:first-child").val() == "") {
		opts +=
			'<option value="">' +
			selectorField.find("option:first-child").text() +
			"</option>";
	}

	for (var i in rows) {
		opts += '<option value="' + i + '">' + rows[i] + "</option>";
	}

	return opts;
};

function allowNumericValues(selector, allowPlus, allowMinus, allowDots) {
	$(selector).keypress(function (event) {
		var code = event.keyCode ? event.keyCode : event.which;
		if (code >= 48 && code <= 57) {
			// numbers
			return;
		}

		var $el = $(this);

		// plus
		if (allowPlus === true && code == 43 && $el.val().indexOf("+") == -1) {
			return;
		}

		// minus
		if (allowMinus === true && code == 45) {
			return;
		}

		// dots
		if (allowDots === true && code == 46 && $el.val().indexOf(".") != -1) {
			return;
		}
		event.preventDefault();
	});
}

function allowAlphabetValues(selector, allowSpace) {
	$(selector).keypress(function (event) {
		var code = event.keyCode ? event.keyCode : event.which;
		if (
			code == 39 ||
			(code >= 65 && code <= 90) ||
			(code >= 97 && code <= 122)
		) {
			//alphabet
			return;
		}

		var $el = $(this);

		// space
		if (allowSpace === true && code == 32) {
			return;
		}
		event.preventDefault();
	});
}

function allowNumericAlphabetValues(
	selector,
	allowPlus,
	allowMinus,
	allowDots,
	allowSpace
) {
	$(selector).keypress(function (event) {
		var code = event.keyCode ? event.keyCode : event.which;

		if (
			code == 39 ||
			(code >= 65 && code <= 90) ||
			(code >= 97 && code <= 122)
		) {
			//alphabet
			return;
		}

		var $el = $(this);
		// space
		if (allowSpace === true && code == 32) {
			return;
		}

		if (code >= 48 && code <= 57) {
			// numbers
			return;
		}

		// plus
		if (allowPlus === true && code == 43) {
			return;
		}

		// minus
		if (allowMinus === true && code == 45) {
			return;
		}

		// dots
		if (allowDots === true && code == 46) {
			return;
		}
		event.preventDefault();
	});
}

// Dont allow user to input specific character
function dontAllowChar(selector, listcode) {
	$(selector).keypress(function (event) {
		var code = event.keyCode ? event.keyCode : event.which;

		for (let i = 0; i < listcode.length; i++) {
			if (code == listcode[i]) {
				event.preventDefault();
			}
		}
		
	});
}

function dateToString(date) {
	if (!date) return "";
	var day = date.getDate() + "";
	if (day.length < 2) {
		day = "0" + day;
	}
	var month = date.getMonth() + 1 + "";
	if (month.length < 2) {
		month = "0" + month;
	}
	var year = date.getFullYear();

	return day + "-" + month + "-" + year;
}

function stringToDate(date) {
	var parts = date.split("-");
	var mydate = new Date(parts[2], parts[1] - 1, parts[0]);
	return mydate;
}

function imageToDataUri(img, width, height) {
	// create an off-screen canvas
	var canvas = document.createElement("canvas"),
		ctx = canvas.getContext("2d");

	// set its dimension to target size
	canvas.width = width;
	canvas.height = height;

	// draw source image into the off-screen canvas:
	ctx.drawImage(img, 0, 0, width, height);

	// encode image to data-uri with base64 version of compressed image
	return canvas.toDataURL("image/jpeg", 1.0);
}

/* JQUERY VALIDATION */

var allMessages = {
	en: {
		fillField: "You must fill this field",
		fillNumeric: "Please fill only with numeric characters",
		fillDeposit: "Minimal deposit must be >= 100000",
		chooseOne: "Please choose one",
		fileRequired: "You must upload a file",
		fileSize: "File must be smaller than 5Mb",
		mimeType: "File must be in JPG format",
		age: "You must be > 17 years old",
		issueDate: "Issue date must be before than expiry date",
		agreeTnc: "You must agree to the terms",
		validEmail: "Please enter a valid email",
		notFuture: "Date must not be in the future",
		notPast: "Date must be in the future",
		validDateFormat: "Please enter a valid format date (format : dd-mm-yyyy)",
		validDate: "Please enter a valid date",
		validTaxId : "Please enter a valid Tax Id",
		maxLength: function (len) {
			return "Value exceeded maximum length: " + len + " characters";
		},
		fixLength: function (len) {
			return "Value length must: " + len + " characters";
		},
		carIsInclude: function (car){
            return "Do not iclude character " + car + "on this column";
        } 
	},
	id: {
		fillField: "Harap isi kolom ini",
		fillNumeric: "Harap isi dengan angka",
		fillDeposit: "Minimal deposit harus >= 100000",
		chooseOne: "Harap pilih satu",
		fileRequired: "Harap unggah berkas",
		fileSize: "Berkas harus lebih kecil dari 5Mb",
		mimeType: "Berkas harus dalam format JPG",
		age: "Anda harus > 17 tahun",
		issueDate: "Tanggal penerbitan harus sebelum tanggal berlaku kartu",
		agreeTnc: "Anda harus menyetujui persyaratannya",
		validEmail: "Harap masukkan email yang sah",
		notFuture: "Tanggal harus sebelum tanggal hari ini",
		notPast: "Tanggal harus sesudah tanggal hari ini",
		validTaxId : "Harap masukkan NPWP valid",
		validDateFormat:
			"Harap masukkan format tanggal yang benar (format : dd-mm-yyyy)",
		validDate: "Harap masukkan tanggal yang benar",
		maxLength: function (len) {
			return "Kolom melebihi batas maksimum: " + len + " karakter";
		},
		fixLength: function (len) {
			return "Kolom harus terdiri dari " + len + " karakter";
		},
		carIsInclude:function(car){
            return "Harap tidak menggunakan karakter " + car + " di kolom ini";
        } 
	},
};

var _validationLang = "id";
var _m = allMessages[_validationLang];

jQuery.extend(jQuery.validator.messages, {
	required: _m.fillField,
	remote: "Please fix this field.",
	email: _m.validEmail,
	url: "Please enter a valid URL.",
	date: "Please enter a valid date.",
	dateISO: "Please enter a valid date (ISO).",
	number: "Please enter a valid number.",
	digits: _m.fillNumeric,
	creditcard: "Please enter a valid credit card number.",
	equalTo: "Please enter the same value again.",
	accept: "Please enter a value with a valid extension.",
	maxlength: jQuery.validator.format(
		"Please enter no more than {0} characters."
	),
	minlength: jQuery.validator.format("Please enter at least {0} characters."),
	fixLength: jQuery.validator.format(_m.fixLength("{0}")),
	rangelength: jQuery.validator.format(
		"Please enter a value between {0} and {1} characters long."
	),
	range: jQuery.validator.format("Please enter a value between {0} and {1}."),
	max: jQuery.validator.format(
		"Please enter a value less than or equal to {0}."
	),
	min: jQuery.validator.format(
		"Please enter a value greater than or equal to {0}."
	),
});

$.validator.methods.required = function (value, element, param) {
	return value != null && value.trim().length > 0;
};

jQuery.validator.addMethod(
	"dateBirthday",
	function (value, element) {
		if (value) {
			var today = new Date();
			var birthdayDt = stringToDate(value);

			var age = today.getFullYear() - birthdayDt.getFullYear();
			var mon = today.getMonth() - birthdayDt.getMonth();
			if (mon < 0 || (mon === 0 && today.getDate() < birthdayDt.getDate())) {
				age--;
			}

			var result = age >= 17;
			return result;
		}
		return true;
	},
	_m.age
);

jQuery.validator.addMethod("validTaxId", function(value, element) {
    var regExp = /[a-zA-Z]/g;

    if(regExp.test(value)){
        return false;
    }else if(value == '000000000000000'){
        return false
    }
    
    return true;
  }, "Harap masukkan NPWP valid");

jQuery.validator.addMethod("isValidDateFormat", function(value, element) {
    return checkValidDateFormat(value);
}, _m.validDateFormat); 

jQuery.validator.addMethod(
	"isValidDateFormat",
	function (value, element) {
		return checkValidDateFormat(value);
	},
	_m.validDateFormat
);

jQuery.validator.addMethod(
	"isValidDateFormatIf",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);

		if (otherField == "identityexpireddate_lifetime") {
			if (!v) {
				return checkValidDateFormat(value);
			}
			return true;
		}

		return true;
	},
	_m.validDateFormat
);

jQuery.validator.addMethod(
	"isValidDate",
	function (value, element) {
		return checkValidDate(value);
	},
	_m.validDate
);

jQuery.validator.addMethod(
	"isValidDateIf",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);

		if (otherField == "identityexpireddate_lifetime") {
			if (!v) {
				return checkValidDate(value);
			}
			return true;
		}

		return true;
	},
	_m.validDate
);

jQuery.validator.addMethod(
	"isValidPhone",
	function (value, element) {
		var regexp = "^\\+?[0-9]*$";
		var re = new RegExp(regexp);

		return this.optional(element) || re.test(value);
	},
	_m.fillNumeric
);

jQuery.validator.addMethod("fixLength", function (value, element, length) {
	return value.length == length;
});
jQuery.validator.addMethod(
	"notFuture",
	function (value, element) {
		if (value) {
			return checkNotFuture(value);
		}
		return true;
	},
	_m.notFuture
);

jQuery.validator.addMethod(
	"notPastIf",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);

		if (otherField == "identityexpireddate_lifetime") {
			if (!v) {
				return checkNotPast(value);
			}
			return true;
		}

		if (value) {
			var issuedTs = stringToDate(value);
			var today = new Date();
			var result = issuedTs.valueOf() < today.valueOf();
			return result;
		}

		return true;
	},
	_m.notPast
);

jQuery.validator.addMethod(
	"fixLengthIf",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);

		if (otherField == "bankname") {
			if (v == "BNI" || v == "BNISY") {
				return value.length == 10;
			}
		}

		if (otherField == "occupationaltype") {
			if (v !== "HOUSE WIFE" && v !== "STUDENT" && v !== "RETIREMENT") {
				return value.length == 15;
			}
		}

		return true;
	}
);

jQuery.validator.addMethod("checkedIf", function (value, element, otherField) {
	var v = store.vform[otherField];
	var el = $(element);

	if (v == 1) {
		if (value == "") {
			return false;
		} else {
			return true;
		}
	} else {
		return true;
	}
});

jQuery.validator.addMethod(
	"requiredIf",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);

		if (
			otherField == "addresspsame" ||
			otherField == "otherinfoemployeeof" ||
			otherField == "otherinfoprohibited"
		) {
			if (v === false) {
				return value.trim().length > 0 && value != "";
			}

			return true;
		}

		if (otherField == "addressphonecountry") {
			if (v == "+62") {
				if (value == "") {
					return false;
				}
				return true;
			}
		}

		if (otherField == "identityexpireddate_lifetime") {
			if (!v) {
				return value.trim().length > 0 && value != "";
			}
			return true;
		}

		if (otherField == "occupationaltype") {
			if (el.attr("id") === "occupationallinebusiness") {
				if (v === "SELF EMPLOYED") {
					return value.trim().length > 0 && value != "";
				}
			}
			if (el.attr("id") === "occupationaljobposition") {
				if (v === "CIVIL SERVANT" || v === "TNI-POLICE") {
					return value.trim().length > 0 && value != "";
				}
			}
			if (el.attr("id") === "occupationaltypeother") {
				if (v === "OTHERS") {
					return value.trim().length > 0 && value != "";
				}
			}
			if (
				el.attr("id") === "taxidnum" ||
				el.attr("id") === "occupationalworkingplace" ||
				el.attr("id") === "occupationalstreet" ||
				el.attr("id") === "occupationalvillage" ||
				el.attr("id") === "occupationalsubdistrict" ||
				el.attr("id") === "occupationalprovince" ||
				el.attr("id") === "occupationalcity" ||
				el.attr("id") === "occupationalcountry" ||
				el.attr("id") === "occupationalpostalcode" ||
				el.attr("id") === "occupationalphone"
			) {
				if (v !== "HOUSE WIFE" && v !== "STUDENT" && v !== "RETIREMENT") {
					return value.trim().length > 0 && value != "";
				}
			}
			return true;
		}

		switch (v) {
			case "P": // assetownership
			case "OTHERS":
			case "12": //ocpsourceincome
			case "OT":
				if (value.trim().length == 0 || value == "") {
					return false;
				} else {
					return true;
				}
				break;
			default:
				return true;
				break;
		}
	},
	_m.fillField
);

jQuery.validator.addMethod(
	"isInclude",
	function (value, element, otherField) {
		var v = store.vform[otherField];
		var el = $(element);
        
        if (otherField === "addressstreet") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}

		if (otherField === "addresshousing") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}
        
        if (otherField === "addresspstreet") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}

		if (otherField === "addressphousing") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}
		
        if (otherField === "occupationalworkingplace") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}

        if (otherField === "occupationalstreet") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}

		if (otherField === "taxidnum") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}

		if (otherField === "occupationalsourceofincomeother") {
            let car = /[^a-zA-Z ]/;
            return checkCarInclude(value, car)
		}

		if (otherField === "identitynum") {
            let car = /[&'\-{},]/;
            return checkCarInclude(value, car)
		}
        
	}
);

function checkCarInclude(value, character) {
	// Check car include
    let result = character.test(value);
    if (result) {
        return false;
    }
	return true;
}

function checkValidDateFormat(value) {
	// First check for the pattern
	if (
		!/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/.test(
			value
		)
	)
		return false;

	return true;
}

function checkValidDate(value) {
	// Parse the date parts to integers
	var parts = value.split("-");
	var day = parseInt(parts[0], 10);
	var month = parseInt(parts[1], 10);
	var year = parseInt(parts[2], 10);

	// Check the ranges of month and year
	if (year < 1000 || year > 3000 || month == 0 || month > 12) return false;

	var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

	// Adjust for leap years
	if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
		monthLength[1] = 29;

	// Check the range of the day
	return day > 0 && day <= monthLength[month - 1];
}

function checkNotFuture(value) {
	var issuedTs = stringToDate(value);
	var today = new Date();
	var result = issuedTs.valueOf() < today.valueOf();
	return result;
}

function checkNotPast(value) {
	var ts = stringToDate(value);
	var today = new Date();
	var result = ts.valueOf() > today.valueOf();
	return result;
}

function checkBirthday(value) {
	var birthdayDt = value.calendar("get date");
	var today = new Date();

	if (birthdayDt) {
		var age = today.getFullYear() - birthdayDt.getFullYear();
		var mon = today.getMonth() - birthdayDt.getMonth();
		if (mon < 0 || (mon === 0 && today.getDate() < birthdayDt.getDate())) {
			age--;
		}

		var result = age >= 17;
		return result;
	}

	return true;
}

function checkDateBefore(value1, value2) {
	var issuedDt = value1.calendar("get date");
	var issuedTs = Date.parse(issuedDt);
	var expiredDt = value2.calendar("get date");
	if (issuedDt && expiredDt) {
		var expiredTs = Date.parse(expiredDt);
		var result = issuedTs.valueOf() < expiredTs.valueOf();
		return result;
	}
	return true;
}

// Fungsi untuk replace character using regexp
// Gunakan onkeyup/oninput jika tag di HTML
function replaceChar(idEl, carDisabled){

    let el = document.getElementById(idEl);
    let tempVal = el.value;   
    let regexpCar =  new RegExp(carDisabled)
    let cekContains = tempVal.match(regexpCar);

    if(cekContains){
        el.value = tempVal.replace(cekContains, '');
    }    
}

// replace last char on input when maxlength input
function maxLengthInput(idEl, maxlength) {
	let el = document.getElementById(idEl);
	if (el.value.length > parseInt(maxlength)) {
		el.value = el.value.slice(0, parseInt(maxlength));
	};
}