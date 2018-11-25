<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 20:44
 */

auth();
$choose_db = selectDb();

$db = new DB($choose_db['src']);
$tables = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
$tb = $tables->fetchArray(1);



?>

<div>
    <form action="/new-table">
        <div class="input-group mb-3 mt-3">
            <label for="create-new-table" class="mr-3 mb-0">Create new table:</label>
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-table"></i>
                </span>
            </div>
            <input type="text" name="table-name" id="create-new-table" class="form-control form-control-sm" placeholder="New table...">
            <button class="btn btn-sm btn-primary ml-3">Create</button>
        </div>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <th></th>
            <th>Tables</th>
            <th>Actions</th>
            <th>Records</th>
            <th>Size</th>
        </thead>
        <tbody>
            <?php if($choose_db): ?>
                <?php while ($tb = $tables->fetchArray(1)): ?>
                    <?php var_dump($tb) ?>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-muted text-center">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
