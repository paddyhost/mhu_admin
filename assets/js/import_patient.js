/*
 @use: validation for multiple upload patient
 @param:
 @return:
 */
$(document).on('click', '.error, .error_sel', function(){
    $(this).removeClass('error error_sel');
})

$(document).on('click', "#insert_multiple", function () {
    // console.log("iam here "+$(this).attr("load-url"));
    var arr_type = [];
    var is_valid = true;
    var letters = /^[A-Za-z ]+$/;
    var fname = '';
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // regular expression for email
    var count = 0;
    var len = $('input[name="fname[]"]').length;
    var mobile_arr = [];
    var email_arr = [];
    var counting = 0;
    var m_exist = 0;
    
    $('input[name="regitrationdate[]"], input[name="phase[]"]').each(function () {
        if ($(this).val().trim() == "") {
            $(this).addClass("error");
            is_valid = false;
        }
    });
    
    //validation for first name
    $('input[name="fname[]"]').each(function () {
        if ($(this).val().trim() == "") {
            $(this).addClass("error");
            is_valid = false;

        }else {
            if ($(this).val().trim().length < 2) {
                // notify('Please enter a valid name.', 'danger');
                $(this).addClass("error");
                is_valid = false;

            }else {
                fname = letters.test($(this).val());
                if (!fname) {
                    // notify('Please enter only alphabet in name.', 'danger');
                    $(this).addClass("error");
                    is_valid = false;
                }
            } // END if ($(this).val().trim().length < 2) {
        } // END if ($(this).val().trim() == "") {
    });

    
    $('select[name="patient_category[]"], select[name="state_id[]"], select[name="district_id[]"], select[name="city_id[]"], select[name="area_id[]"], select[name="location_id[]"]')
    .each(function () {
        if ($(this).val().trim() == "") {
            $(this).next().addClass('error_sel');
            is_valid = false;
        } 
    });

    if (is_valid == false) {
        alert('Please fill the required fields');
    }
    
    
    if (is_valid == true) {
        var len = $('input[name="fname[]"]').length;
        var i;
        var action_url = $(this).attr("load-url");
        var err = false;

        for (i = 0; i < len; i++) {
            var regitrationdate = $('input[name="regitrationdate[]"]:eq(0)').val();
            var fname = $('input[name="fname[]"]:eq(0)').val();
            var dob = $('input[name="dob[]"]:eq(0)').val();
            var age = $('input[name="age[]"]:eq(0)').val();
            var gender = $('input[name="gender[]"]:eq(0)').val();
            var patient_category = $('select[name="patient_category[]"]:eq(0)').val();
            var mobile = $('input[name="mobile[]"]:eq(0)').val();
            var area = $('input[name="area[]"]:eq(0)').val();
            var city = $('input[name="city[]"]:eq(0)').val();
            var district = $('input[name="district[]"]:eq(0)').val();
            var state = $('input[name="state[]"]:eq(0)').val();
            var location = $('input[name="location[]"]:eq(0)').val();
            var symptom1 = $('input[name="symptom1[]"]:eq(0)').val();
            var symptom2 = $('input[name="symptom2[]"]:eq(0)').val();
            var disease_diagnosed = $('input[name="disease_diagnosed[]"]:eq(0)').val();
            var pid = $('input[name="pid[]"]:eq(0)').val();
            var phase = $('input[name="phase[]"]:eq(0)').val();
            var area_id = $('select[name="area_id[]"]:eq(0)').val();
            var city_id = $('select[name="city_id[]"]:eq(0)').val();
            var district_id = $('select[name="district_id[]"]:eq(0)').val();
            var state_id = $('select[name="state_id[]"]:eq(0)').val();
            var location_id = $('select[name="location_id[]"]:eq(0)').val();
            
            $.ajax({
                type: "POST",
                url: action_url,
                async: false,
                data: {pid:pid, regitrationdate: regitrationdate, fname: fname, dob: dob, age: age, gender: gender, patient_category: patient_category, 
                    patient_category:patient_category, mobile: mobile, area: area, city: city,
                    district: district,  state: state,  location: location,  symptom1: symptom1, 
                    symptom2: symptom2,  disease_diagnosed: disease_diagnosed, phase:phase,
                    area_id: area_id, city_id: city_id, district_id: district_id,  state_id: state_id,  location_id: location_id,
                },
                success: function (data) {
                    $("tbody tr:nth-child(1)").remove();
                },
            });

            if (err === true) {
                return false;
            }
        }
        if (err === false && len > 0) {
            alert("Patient(s) added successfully!");
        }
    } // END if (is_valid == true) {
});


//to delete row on add multiple patient view
$(document).on('click', ".patient_remove", function () {
    $(this).parent().closest("tr").remove();
});

$(document).on('click', "#patient_add_rows", function () {
    if ($("#patient_num_rows").val() == "" || $("#patient_num_rows_phase").val() == "") {
        $('#patient_num_rows, #patient_num_rows_phase').addClass("error");
    }else {
        $.ajax({
            url: $(this).attr('load-url') + "/" + $("#patient_num_rows").val() + "/" + $("#patient_num_rows_phase").val(),
            data: {},
            type: "POST",
            async: false,
            success: function (data) {
                if (data !== 'False') {
                    append_patient_num_rows(data)
                }
            }
        });
        // load_ajax("", $(this).attr('load-url') + "/" + $("#patient_num_rows").val() + "/" + row, append_patient_num_rows);
        $("#patient_num_rows").val('');
    }
});

/*
@use: to append rows in multiple add student
@param:
@returns:
*/
function append_patient_num_rows(result) {
    $("#patient_multiple").append(result);
    $(".selectpicker").selectpicker();
    $(".date-picker").datetimepicker({format: 'DD-MM-YYYY', maxDate: 'now'}).on("dp.change", function (e) {
        $(this).removeClass("border_input_error");
    });
}


// on change state dd populate city dd
$(document).on('change', '.state_id, .district_id', function(e){
    var parenttr = $(this).closest('tr');
    var target = e.target.class;
    var state_id = parenttr.find('select[name = "state_id[]"]').val();
    var district_id = parenttr.find('select[name = "district_id[]"]').val();
    var url = '/admin/ajax_get_city/'+state_id+'/'+district_id;
    // alert(url);
    if( state_id >= 1 || district_id >=1){
        
        //populate district dd if state changed
        if(target === 'state_id'){
            var url2 = '/admin/ajax_get_district/'+state_id;
            var district_opt = getData(url2);
            if(district_opt !== false){
                parenttr.find('select[name = "district_id[]"]').empty().append(district_opt);
                parenttr.find('select[name = "district_id[]"]').selectpicker('refresh');
            }                
        }// if target state_id
        
        var city_opt = getData(url);
        if(city_opt !== false){
            parenttr.find('select[name = "city_id[]"]').empty().append(city_opt);
            parenttr.find('select[name = "city_id[]"]').selectpicker('refresh');
            
            if(state_id >=1){
                var state = parenttr.find("select[name = 'state_id[]'] option:selected").text();
                parenttr.find('input[name = "state[]"]').val(state.toLowerCase().trim());
            }
            if(district_id >=1){
                var district = parenttr.find("select[name = 'district_id[]'] option:selected").text();
                parenttr.find('input[name = "district[]"]').val(district.toLowerCase().trim());
            }                    
        }// if city!=false 
        
    }
});

// on change city dd populate area dd
$(document).on('change', '.city_id', function(){
    var parenttr = $(this).closest('tr');
    var city_id = $(this).val();
    
    var phase_id = parenttr.find('input[name = "phase[]"]').val();
    if(phase_id === ''){
        $(this).val('').selectpicker('refresh')
        parenttr.find('input[name = "phase[]"]').addClass('error');
        alert('please select phase for ease of location');
        return false;
    }
    var url = '/admin/ajax_get_area/'+city_id+'/'+phase_id;
    if( city_id >= 1){
        var area_opt = getData(url);
        if(area_opt !== false){
            parenttr.find('select[name = "area_id[]"]').empty().append(area_opt);
            parenttr.find('select[name = "area_id[]"]').selectpicker('refresh');
            var city = parenttr.find("select[name = 'city_id[]'] option:selected").text();
            parenttr.find('input[name = "city[]"]').val(city.toLowerCase().trim());
        }
    }
});

// on change area dd location area dd
$(document).on('change', '.area_id', function(){
    var parenttr = $(this).closest('tr');
    var area_id = $(this).val();
    var phase_id = parenttr.find('input[name = "phase[]"]').val();
    var url = '/admin/ajax_get_location/'+area_id+'/'+phase_id;
    if( area_id >= 1){
        var location_opt = getData(url);
        if(location_opt !== false){
            parenttr.find('select[name = "location_id[]"]').empty().append(location_opt);
            parenttr.find('select[name = "location_id[]"]').selectpicker('refresh');
            var area = parenttr.find("select[name = 'area_id[]'] option:selected").text();
            parenttr.find('input[name = "area[]"]').val(area.toLowerCase().trim());
        }
    }
});

$(document).on('change', '.location_id', function(){
    var parenttr = $(this).closest('tr');
    var location = parenttr.find("select[name = 'location_id[]'] option:selected").text();
    parenttr.find('input[name = "location[]"]').val(location.toLowerCase().trim());
});

function getData(url){
    var result = false;
    $.ajax({
        url: url,
        dataType: 'json',
        async: false,
        type: 'POST',
        success: function (response) {
            result = response;
        }
    });
    
    return result;
}

$(document).on('click', '.error, .error_sel', function(){
    $(this).removeClass('error error_sel');
})
