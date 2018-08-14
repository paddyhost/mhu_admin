/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
    
    $(document).on('click', '.proceed1', function(){
        var id = $(this).attr('id');
        if(id == 'btnuid'){
            if($("#unique_id").val() == ''){
                alert('unique ID cannot be Empty');
                return false;
            }
        }
        
        $('#uidDiv').hide();
        $('#form_registration').show();
    });
    
   $('.form-wizard-basic').bootstrapWizard({
        tabClass: 'fw-nav',
        'nextSelector': '.next',
        'previousSelector': '.previous',
        onInit: function(){
            $('.finish').hide();
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
            
            if(index==5)
            $('.finish').show();

            var flag_next = 1;
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
        alert('Finished!, Starting over!');
        $('.form-wizard-basic').bootstrapWizard('finish',5);
    }); 
    
    $(document).on('click', '#btn_prescrib_struct', function(){
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
                }
            }
        });
    });
    
    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });
    
    
});

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




