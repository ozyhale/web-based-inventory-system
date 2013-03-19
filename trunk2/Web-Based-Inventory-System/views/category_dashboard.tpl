<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li class="divider-vertical"><a href="index.php">Products</a></li>
            <li class="active"><a href="category.php">Categories</a></li>
        </ul>
        <form class="navbar-form pull-right">
            <input type="hidden" name="action" value="search_filtering">
            <input type="text" class="span2" name="search" id="search" value="{$search_value}">
            <button type="submit" class="btn btn-success"><i class="icon-search icon-white"></i></button>
        </form>
    </div>
</div>


<div class="row">
    <div class="span3">
        {include file=$AddEdit_category_file}
    </div>
    <div class="span9">
        <table class="table table-bordered">
            <tr>
                <th><input type="checkbox" onclick="isCheck({$rowCount_category})" id="check"> Category Name</th>
                <th>Controls</th>
            </tr> 
            {foreach from=$array_category_name key = k item = i}
                <tr>
                    <td><label class="checkbox"><input class="Checkbox" type="checkbox" id = '{$k}' value = {$array_category_id[$k]} > {$i}</label></td>
                    <td>
                        <a style="cursor:pointer;" onclick="window.location.href='category.php?action=edit_category&key={$array_category_id[$k]}'"><i class="icon-pencil"></i> Edit</a> &nbsp;
                    </td>
                </tr>
            {/foreach}
        </table>

        <!-- Delete Button-->
        <a style="cursor:pointer;" onclick="findCheck('{$rowCount_category}','category')" >
            <i class="icon-remove"></i> Delete Selected
        </a>

        <!-- Pagination-->
        <div class="pull-right">
            Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
                <option>--</option>
                {for $start = 1 to $category_length}
                <option>{$start}</option>
                {/for}
            </select>
        </div>
    </div>

</div>







