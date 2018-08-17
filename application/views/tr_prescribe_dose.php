<tr>
    <td>
        <input type="hidden" name="id[]" value="<?= $data['id']?>">
        <input type="hidden" name="name[]" value="<?= $data['name']?>">
        <?= $data['name']?>    
    </td>
    <td>
        <input type="hidden" name="frequency[]" value="<?= $data['frequency']?>">
        <?= $frequency[$data['frequency']];?>
    </td>
    <td>
        <input type="hidden" name="days[]" value="<?= $data['days']?>">
        <?= $data['days']?>
    </td>
    <td>
        <input type="hidden" name="aftermeal[]" value="<?= $data['aftermeal']?>">
        <?= $aftermeal[$data['aftermeal']];?>
    </td>
    <td>
        <button type="button" class="btn btn-warning remove">Remove</button>
    </td>
</tr>
