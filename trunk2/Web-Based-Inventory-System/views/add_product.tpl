<form class="well" method="post" action="index.php?action=add_product">
    <h5>Add Product</h5>
    <input type="text" name="product_name" placeholder="Product Name" required>
    <select name="category" required>
        <option>Category:</option>
        {foreach from=$array_category_name1 key=k item=i}
            <option value="{$array_category_id1[$k]}">{$i}</option>
        {/foreach}
    </select>
    {literal}
        <input type="text" name="quantity" placeholder="Quantity" required>
    {/literal}
    <input type="submit" name="add_product" value="save">
</form>