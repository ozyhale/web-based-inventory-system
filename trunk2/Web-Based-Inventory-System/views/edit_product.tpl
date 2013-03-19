<form class="well" method="post">
    <h5>Edit Product</h5>
    <input type="text" name="product" value="{$pre_product_name}">
    <select name="category" required>
        {foreach from=$array_category_name1 key=k item=i}
            <option value="{$array_category_id1[$k]}" {if $pre_category_name eq $i} selected {/if} >{$i}</option>
        {/foreach}
    </select>
    <input type="text" name="quantity" value="{$pre_quantity}">
    <input type="submit" name="edit_product" value="save">
</form>