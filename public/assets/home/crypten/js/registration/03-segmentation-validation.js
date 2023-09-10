var formValidationApp = {
    acctype: "required",
    onlinetype: "required",
    branch: {
        required: function(element){
            return $("input[name='onlinetype']:checked").val()== "H";
        }
    }

}

var formValidationAppMessage = {}