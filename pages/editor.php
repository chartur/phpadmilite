<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 03:41
 */

?>

<div class="row">
    <div class="col-8">
    <textarea id="code" name="code">

    </textarea>
    </div>
    <div class="col-4">

    </div>
</div>


<script>

    $(document).ready(function () {
        var mime = 'text/x-mariadb';

        // get mime type
        if (window.location.href.indexOf('mime=') > -1) {
            mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
        }

        window.editor = CodeMirror.fromTextArea(document.getElementById('code'), {
            mode: mime,
            indentWithTabs: true,
            smartIndent: true,
            lineNumbers: true,
            matchBrackets : true,
            autofocus: true
        });
    })
</script>