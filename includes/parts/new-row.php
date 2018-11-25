<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 02:49
 */

$sqlite_options = include "../../config/sqlite-options.php";
$count = isset($_GET['count']) ? $_GET['count'] : 1;
?>

<?php for($j=0; $j<=$count; $j++): ?>
    <tr>
        <td>
            <input type="text" name="name" class="form-control form-control-sm">
        </td>
        <td>
            <div class="form-group">
                <select class="form-control form-control-sm" name="type">
                    <?php foreach ($sqlite_options['field_types'] as $key => $option ): ?>
                        <option value="<?= $key ?>"><?= $option ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </td>
        <td>
            <input type="text" name="default" class="form-control form-control-sm">
        </td>
    <!--    <td>Index</td>-->
        <td>
            <input type="checkbox" class="form-control form-control-sm" name="nn">
        </td>
        <td>
            <input type="checkbox" class="form-control form-control-sm" name="pk">
        </td>
        <td>
            <input type="checkbox" class="form-control form-control-sm" name="ai">
        </td>
        <td>
            <input type="checkbox" class="form-control form-control-sm" name="u">
        </td>
    </tr>
<?php endfor; ?>