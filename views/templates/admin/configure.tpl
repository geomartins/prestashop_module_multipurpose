 <form method="POST">
<div class="panel">
    <div class="panel-heading">
        {l s='configuration' mod='multipurpose'}
    </div>

    <div class="panel-body">
       
            <label for='print'> {l s='What to print' mod='multipurpose'}</label>
            <input type='text' name='print' id='print' value="{$MULTIPURPOSE_STR}" class="form-control"/>
        
       
    </div>

    <div class="panel-footer">
        <button type="submit" name='savemultipurposesting' class="btn btn-default pull-right" >
            <i class="process-icon-save"></i>
            {l s='Save' mod='multipurpose'}
        </button>
    </div>
</div>

</form>