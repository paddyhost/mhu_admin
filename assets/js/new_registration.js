/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
    
    $(document).on('click', '.proceed1', function(){
        var id = $(this).attr('id');
        if(id == 'btnuid'){
            if(!validate_input('unique_id')){
//            if($("#unique_id").val() == ''){
                alert('unique ID cannot be Empty');
                return false;
            }else {
                var uid = $('#unique_id').val();
                var response = getPatientInfo(uid);
                //console.log(response);
                if(response.code == 200){
                    alert('Patient status found.')
                    var data = response.data;
                    $("#insert").val(0);
                    $("#registration_no").val(data.registration_no); $("#pid").val(data.id);
                    
                    //patient data
                    $('#patient_category').val(data.patient_category).selectpicker('refresh');
                    $('#fname').val(data.fname);
                    $('#lname').val(data.lanme);
                    $('input:radio[value="'+data.gender+'"]').prop("checked", true);
                    $('#mobile').val(data.mobile);
                    $('#state').val(data.state).selectpicker('refresh');
                    $('#district').val(data.district).selectpicker('refresh');
                    $('#city').val(data.city);
                    $('#area').val(data.area);
                    $('#location').val(data.location);
                    $('#dob').val(data.dob).change();
                    $('#dor').val(data.regitrationdate).change();
                    
                    //init dob & dor with datepicker
                    
                    
                }else {
                    alert('Patient with Unique ID not found.')
                    return false;
                }
            }
        }
        
        $('#uidDiv').hide();
        $('#form_registration').show();
    });
    
   $('.form-wizard-basic').bootstrapWizard({
        tabClass: 'fw-nav',
        'nextSelector': '.next',
        'previousSelector': '.previous',
//        onInit: function(){
//            $('.finish').hide();
//        },
        onTabShow: function(tab, navigation, index) {
            $('.finish').hide();
            if(index==5){
                $('.finish').show();
            }
        },
//        onTabClick: function(tab, navigation, index) {
//            alert('on tab click disabled');
//            return false;
//        },
        onNext: function(tab, navigation, index) {
            var current_tab = tab.children().attr('href');
            var url = tab.children().attr('url');
            console.log(tab);
            alert(index + ' ' + current_tab + url);
            
            var flag_next = 1;
            //flag_next = validate_tab(index,current_tab);
            
//            if(index > 1 && $('#visit_master_id').val() == 0){
//                alert('Patient info not availab;e')
//                return false;
//            }
            
            var response = post_data(current_tab, url, index);
            if(!response){
                flag_next = 0;
            }else {
                if(response.code == 401){
                   flag_next = 0;
                }else{
                    var result = response.data;
                    switch (index){
                        case 1:
                            //general information
                            $('#unique_id').val(result.unique_id);
                            $('#registration_no').val(result.registration_no);
                            $('#pid').val(result.id);
                            $('#visit_master_id').val(result.visit_master_id);
                            
                        break;
                        
                    }
                }
                alert(response.message);
            }
            
            if(!flag_next){
                return false;
            }
        }
    });
    
    $('.form-wizard-basic .finish').click(function() {
        var url = $(this).attr('url');
        var response = post_data('#test_outside', url, 6);
        if(!response){
            return false;
        }else {
            if(response.code == 01){
               return false;
            }else{
                alert('Finished!, Starting over!');
                location.reload();
            }
            alert(response.message);
        }
        $('.form-wizard-basic').bootstrapWizard('finish',5);
    }); 
    
    $(document).on('click', '#btn_prescrib_struct', function(){
        var is_valid = true;
        $('#prescribe_dose .selectpicker').each(function(i,e){
            if($(this).val() == ''){
                is_valid = false;
            }
            
        })
        $('#prescribe_dose input').each(function(i,e){
            if($(this).val() == ''){
                is_valid = false;
                $(this).addClass('error');
            }
        })
        
        if(!is_valid){
            alert('please provide data');
            return false;
        }
        
        var url = $(this).attr('url');
        $.ajax({
            url: url,
            dataType: 'json',
            async: false,
            type: 'POST',
            data: $('#prescribe_dose').serializeArray(),
            success: function (response) {
                if(response.code == 200){
                    $("#prescribe_dose_table tbody").append(response.data);
                    reset('prescribe_dose');
                    $('#modalPrescription').modal('hide');
                }
            }
        });
    });
    
    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });
    
    
});


function getPatientInfo(uid){
    var result = [];
    $.ajax({
        url: '/patient/getPatientInfo',
        dataType: 'json',
        async: false,
        type: 'POST',
        data: {'unique_id':uid},
        success: function (response) {
            result = response;
        }
    });
    return result;
}

function post_data(current_tab, url, index){
    // alert(current_tab); return false;
    var result = false;
    var data = $(current_tab).find('form').serializeArray();
    data.push({name: 'format', value: 'json'},
              {name: 'unique_id', value: $('#unique_id').val()},
              {name: 'registration_no', value: $('#registration_no').val()},
              {name: 'visit_master_id', value: $('#visit_master_id').val()},
              {name: 'pid', value: $('#pid').val()}
            );

//    var newFormdata = new FormData();
//    newFormdata.append('format','json');
//    
//    $.each(data,function(k,v){
//        newFormdata.append(v.name,v.value);
//    });
    
    if(current_tab && url){
        $.ajax({
            url: url,
            dataType: 'json',
            async: false,
            type: 'POST',
            data: data,
            success: function (response) {
                console.log(response)
                result = response;
            }
        });
        
//        $.ajax({
//            url : url,
//            dataType: 'json',
//            type: 'POST',
//            async: false,
//            cache: false,
//            contentType: false,
//            processData: false,
//            data: newFormdata,
//            success:function(response){
//                result = response;
//            }
//        });
        
    }
    return result;
}

function reset(id){
    var id = '#'+id;
    $(id).find('.selectpicker').val('').selectpicker('refresh');
    $(id).find('input').val('');
    $(id).find('radio').val('');
}

$(document).on('click', '.error', function(){
    $(this).removeClass('error');
})

function validate_tab(index, current_tab){
    var is_valid = 1;
    switch (index){
        case 1:
            if(!validate_input()){
                is_valid = 0;
            }else if(!validate_select()){
                is_valid = 0;
            }
            break;
    }
    
    return is_valid;
}

function validate_input(inputIDs){
    var is_valid = 1;
    var ids = inputIDs.split(',');
    $.each(ids, function(k,v){
        
        var id = '#'+v;
        if($(id).val() == ''){
            $(id).addClass('error');
            is_valid = 0;
        }
    })
    return is_valid;
}
