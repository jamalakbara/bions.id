document.getElementById("meta_desc").addEventListener("load", countMetaDescValue());
// document.getElementById("meta_slug").addEventListener("load", validateMetaSlugValue());
document.getElementById("title").addEventListener("load", autoFillFromTitleOnLoad());

var is_titlevalidated = true;
var is_metatitlevalidated = true;
var is_metadescvalidated = true;
var is_metaslugvalidated = true;

function autoFillFromTitle() {
	var el_title = document.getElementById("title");

	document.getElementById("meta_title").value = el_title.value;
	document.getElementById("meta_slug").value = el_title.value;

	validateMetaTitleValue();
	validateMetaSlugValue();
}

function autoFillFromTitleOnLoad() {
	var el_title = document.getElementById("title");
	var el_metatitle = document.getElementById("meta_title");
	var el_metaslug = document.getElementById("meta_slug");
	if (el_metatitle.value == null || el_metatitle.value == "") {
		document.getElementById("meta_title").value = el_title.value;
		validateMetaTitleValue();
	}

	if (el_metaslug.value == null || el_metaslug.value == "") {
		document.getElementById("meta_slug").value = el_title.value;
		validateMetaSlugValue();
	}
	
}

function validateTitleValue(){
    var el_title = document.getElementById("title");
    var count_title = el_title.value.length;

    if(count_title > 200){
        document.getElementById("title_warning").innerHTML = "*Maximal 200 character";
        document.getElementById("title_warning").style.color = 'red';
        document.getElementById("title_warning").style.display = 'block';
        is_titlevalidated = false;
    } else {
        document.getElementById("title_warning").innerHTML = "";
        document.getElementById("title_warning").style.color = '';
        document.getElementById("title_warning").style.display = 'none';
        is_titlevalidated = true;
    }
    check_buttonSaveActive();
}

function validateMetaTitleValue(){
    var el_metatitle = document.getElementById("meta_title");
    var count_metatitle = el_metatitle.value.length;

    if(count_metatitle > 200){
        document.getElementById("meta_title_warning").innerHTML = "*Maximal 200 character";
        document.getElementById("meta_title_warning").style.color = 'red';
        document.getElementById("meta_title_warning").style.display = 'block';
        is_metatitlevalidated = false;
    } else {
        document.getElementById("meta_title_warning").innerHTML = "";
        document.getElementById("meta_title_warning").style.color = '';
        document.getElementById("meta_title_warning").style.display = 'none';
        is_metatitlevalidated = true;
    }
    check_buttonSaveActive();
}

function countMetaDescValue(){
    var el_metadesc = document.getElementById("meta_desc");
    var count_metadesc = el_metadesc.value.length;
    if(count_metadesc > 1000){
        el_metadesc.value = el_metadesc.value.slice(0, 1000);
        count_metadesc = el_metadesc.value.length
    }
    document.getElementById("meta_desc_car").innerHTML = count_metadesc;
};

function validateMetaSlugValue(){
    var is_checkavailable = false;

    var el_metaslug = document.getElementById("meta_slug");
    var metaslug_url = convertToURL(el_metaslug.value);
    document.getElementById("meta_slug_sample").innerHTML = metaslug_url;

    var count_metaslug = metaslug_url.length;
    if(count_metaslug > 200){
        meta_slug_warning(true, "more-than-char-max");
        is_metaslugvalidated = false;
        is_checkavailable = false;
    } else {
        var is_checkavailable = true;
		meta_slug_warning(false, "");
		is_metaslugvalidated = true;
    }

    if (metaslug_url == null || metaslug_url == "") {
        document.getElementById("meta_slug_sample").style.color = '';
        meta_slug_warning(false, "");
        is_metaslugvalidated = true;
    } else if(is_checkavailable){
        if(document.getElementById("meta_slug_previous") != null){
            var val_metaslugprev = document.getElementById("meta_slug_previous").textContent;
        } else{
            var val_metaslugprev = "";
        }
    
        if(val_metaslugprev != metaslug_url){
            metaSlugAvailableValidation(metaslug_url);
        } else {
            meta_slug_warning(false, "");
            is_metaslugvalidated = true;
        }
    }
    check_buttonSaveActive();
};

function metaSlugAvailableValidation(metaslug_url){
    jQuery.ajax({
        method: "POST",
        url: base_url + "admin/learning/get_LearningDatasByUrl",
        dataType: 'json',
        data: {meta_slug: metaslug_url},
        success: function (response) {
            if(response.length > 0){
                document.getElementById("meta_slug_sample").style.color = 'red';
                meta_slug_warning(true, "slug not available");
                is_metaslugvalidated = false;
            } else {
                document.getElementById("meta_slug_sample").style.color = '';
                meta_slug_warning(true, "slug available");
                is_metaslugvalidated = true;
            }
            check_buttonSaveActive();
        }
    });
}

function meta_slug_warning(is_show, typemsg){
    if(is_show){
        document.getElementById("meta_slug_warning").style.display = 'block';
        if (typemsg == "more-than-char-max") {
            document.getElementById("meta_slug_warning").innerHTML = "*Maximal 200 character";
            document.getElementById("meta_slug_warning").style.color = 'red';
            document.getElementById("meta_slug_warning").style.display = 'block';
        } else if (typemsg == "slug available") {
            document.getElementById("meta_slug_warning").innerHTML = "*meta slug is verified";
            document.getElementById("meta_slug_warning").style.color = 'green';
            document.getElementById("meta_slug_warning").style.display = 'block';
        } else if (typemsg == "slug not available"){
            document.getElementById("meta_slug_warning").innerHTML = "*meta slug is already used";
            document.getElementById("meta_slug_warning").style.color = 'red';
            document.getElementById("meta_slug_warning").style.display = 'block';
        }
    } else {
        document.getElementById("meta_slug_warning").innerHTML = "";
        document.getElementById("meta_slug_warning").style.color = '';
        document.getElementById("meta_slug_warning").style.display = 'none';
    }

}

function check_buttonSaveActive(){
    if (is_titlevalidated == false || is_metatitlevalidated == false || is_metadescvalidated == false || is_metaslugvalidated == false) {
        document.getElementById("btn_submit").disabled = true;
        document.getElementById("meta_seo_valid").value = "";
    } else {
        document.getElementById("btn_submit").disabled = false;
        document.getElementById("meta_seo_valid").value = "is_valid";
    } 
}

function convertToURL(text) {
    return text
    .toLowerCase()
    .trim()
    .replace(/[^\w\s-]/g, '')
    .replace(/[\s_-]+/g, '-')
    .replace(/^-+|-+$/g, '');
}

