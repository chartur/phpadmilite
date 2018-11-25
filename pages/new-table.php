<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 02:27
 */

if(!isset($_GET['table-name'])){
    redirect('/home', ['danger', 'Table name is required!']);
}

$table_name = $_GET['table-name']

?>


<div>
    <div class="input-group mb-3 mt-3">
        <label for="create-new-table" class="mr-3 mb-0">Table Name:</label>
        <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-table"></i>
                </span>
        </div>
        <input type="text" name="table-name" value="<?= $table_name ?>" id="create-new-table" class="form-control form-control-sm" placeholder="New table...">
        <input type="number" class="form-control form-control-sm ml-5 add-new-row-count" value="1">
        <button class="btn btn-sm btn-secondary ml-3 add-new-row">Add</button>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Default</th>
<!--                <th>Index</th>-->
                <th>Not Null</th>
                <th>Primary Key</th>
                <th>Auto Increment</th>
                <th>Unique</th>
            </tr>
        </thead>
        <tbody>
            <?= file_get_contents(url("includes/parts/new-row.php?count=4")) ?>
        </tbody>
    </table>
</div>

<script>
    $('.add-new-row').click(function () {
        var count = $('.add-new-row-count').val();
        $.ajax({
            url: 'includes/parts/new-row.php?count='+count,
            type: 'get',
            dataType: 'html',
            success: function (res) {
                $('tbody').append(res)
            }
        })
    })
</script>


