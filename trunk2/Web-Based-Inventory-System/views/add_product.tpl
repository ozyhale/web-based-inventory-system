<form class="well" method="post" action="index.php?action=add_product">
    <legend>Add Product</legend>
    <input type="text" class="span2" name="product_name" placeholder="Product Name" required>
    <select class="span2" name="category" required>
        <option>Category:</option>
        {foreach from=$array_category_name1 key=k item=i}
            <option value="{$array_category_id1[$k]}">{$i}</option>
        {/foreach}
    </select>
    <input class="span2" type="text" name="quantity" placeholder="Quantity" required><br>
    <button class="btn btn-primary" type="submit" name="add_product">
        <i class="icon-save"></i> Save
    </button>
</form>