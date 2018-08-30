<?php foreach ($mhu_test as $key => $value):?>
<div class="panel panel-collapse">
<div class="panel-heading" role="tab">
    <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionTest" href="#panel<?= $value->id?>" aria-expanded="true">
            <?= $value->test_name?>
        </a>
    </h4>
</div>
<div id="panel<?= $value->id?>" class="collapse m-t-15" role="tabpanel">
    <div class="panel-body">
        <?php $i = 1; foreach (explode('--', $value->attribute_values) as  $attribute_values):?>
        <?php if($i%3 == 1):?> <div class="row"><?php endif;?>
            
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <?php $attr = explode('|', $attribute_values);?>
                    <label><?= $attr[0]?></label>
                    <div class="fg-line">
                        <input name="test[<?=$value->id?>][<?=$attr[1]?>]" type="text" class="form-control" value=""> <!--<?= $attr[1]; ?>-->
                    </div>
                </div>
            </div>
            
        <?php if($i%3 == 0 || count(explode('--', $value->attribute_values))== $i):?></div><?php endif;?>
        <?php $i++; endforeach;?>
    </div>
</div>
</div>
<?php  endforeach;?>
