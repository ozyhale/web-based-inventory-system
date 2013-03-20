<form class="well" method="post">
    <legend>Edit Product</legend>
    <input class="span2" type="text" name="product" value="{$pre_product_name}">
    <select class="span2" name="category" required>
        {foreach from=$array_category_name1 key=k item=i}
            <option value="{$array_category_id1[$k]}" {if $pre_category_name eq $i} selected {/if} >{$i}</option>
        {/foreach}
    </select>
    <input class="span2" type="text" name="quantity" value="{$pre_quantity}"><br>
    <button class="btn btn-primary" type="submit" name="edit_product">
        <i class="icon-save"></i> Save
    </button>
</form>