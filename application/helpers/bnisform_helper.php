<?php

if ( ! function_exists('bnis_form_input'))
{
	function bnis_form_input($data = '', $value = '', $extra = '')
	{
		if (isset($data['id'])) {
            if (empty($data['name'])
            ) {
                $data['name'] = $data['id'];
            }
        }

		

        if (
            empty($data['v-model']) ||
            (isset($data['v-model']) && $data['v-model'] !== false)
        ) {
            $data['v-model'] = 'vform.' . $data['id'];
        }

        if (!array_key_exists('uppercase', $data) || (
            isset($data['uppercase']) && $data['uppercase'] !== false
        )) {
            $data['@blur'] = 'vform.' . $data['id'] . ' = $event.target.value.toUpperCase()';
        }

        if (isset($data['lowercase']) && $data['lowercase'] == true) {
            $data['@blur'] = 'vform.' . $data['id'] . ' = $event.target.value.toLowerCase()';
        }

        return form_input($data, $value, $extra);
	}
}

if ( ! function_exists('bnis_label_input'))
{
    function bnis_label_input($data = '', $value = '', $extra = '')
    {
        return '<div class="row"><div class="input-field input-right col s12">'. bnis_form_input($data, $value, $extra) .'<label for="' . $data['id'].'">' . $data['label'] .'</label></div></div>';
    }
}

if ( ! function_exists('bnis_wide_input'))
{
	function bnis_wide_input($data = '', $value = '', $extra = '')
	{
        
	   if (isset($data['label'])) {
            if (empty($data['placeholder'])
            ) {
                $data['placeholder'] = $data['label'];
            }
        }

        $align = '';
        if (isset($data['align'])) {
            $align = 'input-'.$data['align'];
        }

		return '<div class="row"><div class="input-field col s12 '. $align . '">'. bnis_form_input($data, $value, $extra) .'</div></div>';
	}
}

if ( ! function_exists('bnis_form_radio'))
{
	function bnis_form_radio($data = '', $value = '', $checked = FALSE, $extra = '')
	{
		is_array($data) OR $data = array('name' => $data);
		$data['type'] = 'radio';

		return bnis_form_checkbox($data, $value, $checked, $extra);
	}
}

if ( ! function_exists('bnis_form_checkbox'))
{
	function bnis_form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '')
	{
		if (isset($data['id'])) {
            if (empty($data['name'])
            ) {
                $data['name'] = $data['id'];
            }
        }
        if (
            empty($data['v-model']) ||
            (isset($data['v-model']) && $data['v-model'] !== false)
        ) {
            $data['v-model'] = 'vform.' . $data['id'];
        }

        return '<p><label>' . form_checkbox($data, $value, $checked, $extra) . '<span>' . $data['label'] . '</span></label></p>';
    }
}

if ( ! function_exists('bnis_form_dropdown'))
{
    /**
     * Drop-down Menu
     *
     * @param   mixed   $data
     * @param   mixed   $options
     * @param   mixed   $selected
     * @param   mixed   $extra
     * @return  string
     */
    function bnis_form_dropdown($data = '', $options = array(), $selected = array(), $extra = '', $empty = '')
    {
        
        if (!empty($empty)){
             $options =  array('' => $empty) + $options;
        }

        if(!empty($data)){
            $extra = $extra . ' id="' . $data .'"';
        }
        if(!empty($extra)){
            if(is_array($extra)){
                $extra = array_merge([
                    'v-model' => 'vform.'.$data
                ], $extra);       
            } else{
                $extra = $extra . ' v-model="vform.' . $data .'"';
            }
        } else{
            $extra = 'v-model="vform.' . $data .'"';
        }

        return form_dropdown($data, $options, $selected, $extra);
    }
}		


?>