<?php for ($i = 1; $i <= $total_rows; $i++): ?>
<tr>
    <td style="width:120px"> <input type="text" class="form-control" name="regitrationdate[]" value="<?= @$regitrationdate;?>"></td>
    <td style="width:200px"> <input type="text" class="form-control" name="fname[]" value="<?= @$fname;?>"></td>
    <td style="width:120px"> <input type="text" class="form-control" name="dob[]" value="<?= @$dob;?>"></td>
    <td style="width:60px"> <input type="text" class="form-control" name="age[]" value="<?= @$age;?>"></td>
    <td style="width:60px"> <input type="text" class="form-control" name="gender[]" value="<?= @$gender;?>"></td>
    <td style="width:60px"> 
        <!-- <input type="text" class="form-control" name="patient_category[]" value="<?= @$patient_category;?>"> -->
        <select data-width="100px" class="selectpicker" name="patient_category[]" id="patient_category">
            <option value="">Select</option>
            <option <?php echo (@$patient_category == "C" ? "selected":"")?> value="C">Child under 19 years of age</option>
            <option <?php echo (@$patient_category == "LW" ? "selected":"")?> value="LW">Lactating women</option>
            <option <?php echo (@$patient_category == "PW" ? "selected":"")?> value="PW">Pregnant women</option>
            <option <?php echo (@$patient_category == "S" ? "selected":"")?> value="S">Senior citizen above 60 years of age</option>
            <option <?php echo (@$patient_category == "O" ? "selected":"")?> value="O">Other</option>
        </select>
    </td>
    <td  style="width:120px"> <input type="text" class="form-control" name="mobile[]" value="<?= @$mobile;?>"></td>

    <!-- State table data -->
    <td> <input type="hidden" class="form-control" name="state[]" value="<?= @$state;?>" title="Select State">
    <select class="selectpicker state_id" name="state_id[]" id="state_id">
        <option value="">Select</option>
        <?php
        foreach (@$state_arr as $key => $value) {
            $selected = '';
            if (strtolower(@$value->name) == strtolower(@$state)) {
                $selected = 'selected';
            }
            ?>
            <option value="<?php echo @$value->id; ?>" <?php echo @$selected; ?>><?php echo @$value->name; ?></option>
        <?php } ?>
    </select>
    </td>

    <!-- District table data -->
    <td> <input type="hidden" class="form-control district" name="district[]" value="<?= @$district;?>">
    <select class="selectpicker district_id" name="district_id[]" id="district_id" title="Select District">
        <option value="">Select</option>
        <?php
        foreach (@$district_arr as $key => $value) {
            $selected = '';
            if (strtolower(@$value->name) == strtolower(@$district)) {
                $selected = 'selected';
                $selected_state_id = $value->id;
            }
            ?>
            <option value="<?php echo @$value->id; ?>" <?php echo @$selected; ?>><?php echo @$value->name; ?></option>
        <?php } ?>
    </select>
    </td>

    <!-- City  -->
    <td> <input type="hidden" class="form-control city" name="city[]" value="<?= @$city;?>">
    <select class="selectpicker city_id" name="city_id[]" id="city_id" title="Select City">
        <option value="">Select</option>
        <?php 
        foreach (@$city_arr as $key => $value) {
            $selected = '';
            if (strtolower(@$value->name) == strtolower(@$city)) {
                $selected = 'selected';
                $selected_city_id = $value->id;
            }
            ?>
            <option value="<?php echo @$value->id; ?>" <?php echo @$selected; ?>><?php echo @$value->name; ?></option>
        <?php } ?>
    </select>
    </td>

    <!-- Area -->
    <td> <input type="hidden" class="form-control area" name="area[]" value="<?= @$area;?>">
    <select class="selectpicker area_id" name="area_id[]" id="area_id" title="Select Area">
        <option value="">Select</option>
        <?php $where_arr = ["map.phase_id" => @$phase];
        if(isset($selected_city_id))
            $where_arr["am.city_id"] = @$selected_city_id;

        $area_query = $this->db->select('am.name, map.area_id as id')->from('map_area_phase map')
                    ->where($where_arr)
                    ->join('area_master as am', 'am.id = map.area_id', 'left')->get();
        $area_arr = $area_query->result();
        
        foreach (@$area_arr as $key => $value) {
            $selected = '';
            if (strtolower(@$value->name) == strtolower(@$area)) {
                $selected = 'selected';
                $selected_area_id = $value->id;
            }
            ?>
            <option value="<?php echo @$value->id; ?>" <?php echo @$selected; ?>><?php echo @$value->name; ?></option>
        <?php } ?>
    </select>
    </td>

    <!-- location  -->
    <td> <input type="hidden" class="form-control location" name="location[]" value="<?= @$location;?>" >
    <select class="selectpicker location_id" name="location_id[]" id="location_id" title="Select location">
        <option value="">Select</option>
        <?php
        $where_location_arr = ["phase_id" => @$phase];
        if(isset($selected_area_id))
            $where_location_arr["aria_id"] = @$selected_area_id;
        $location_query = $this->db->get_where('locations_master',$where_location_arr);
        $location_arr = $location_query->result();
        foreach (@$location_arr as $key => $value) {
            $selected = '';
            if (strtolower(@$value->name) == strtolower(@$location)) {
                $selected = 'selected';
            } ?>
            <option value="<?php echo @$value->id; ?>" <?php echo @$selected; ?>><?php echo @$value->name; ?></option>
        <?php } ?>
    </select>
    </td>
    <td> <input type="text" class="form-control" name="symptom1[]" value="<?= @$sympyom1;?>"></td>
    <td> <input type="text" class="form-control" name="symptom2[]" value="<?= @$sympyom2;?>"></td>
    <td> <input type="text" class="form-control" name="disease_diagnosed[]" value="<?= @$disease_diagnosed;?>"></td>
    <td style="width:60px"> <input type="text" class="form-control" name="pid[]" value="<?= @$pid;?>"></td>
    <td style="width:60px"> <input type="text" class="form-control" name="phase[]" value="<?= @$phase;?>"></td>
    <td style="">
        <a class="pull-right patient_remove" data-toggle='tooltip' data-placement='left' title='Delete' ><i class="zmdi zmdi-delete zmdi-hc-fw" ></i></a>
    </td>
</tr>
<?php endfor;?>