<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 12:28 PM
 */

if(user()){
    redirect('/home');
}
?>

<div class="col-12 col-sm-6 offset-sm-3">
    <form class="mt-5" method="post" action="/posts/setup" enctype="multipart/form-data">
        <div>
            <div class="col-auto">
                <label class="sr-only" for="username">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-user"></span>
                        </div>
                    </div>
                    <input type="text" name="username" class="form-control" required id="username" placeholder="Username">
                </div>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="password">Password</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="password" required id="password" placeholder="Password">
                </div>
            </div>

            <div class="text-center mb-2">
                <p class="text-muted">
                    <b>Database options</b>
                </p>
                <div class="btn-group btn-group-toggle radio-buttons" data-toggle="buttons">
                    <label class="btn btn-secondary btn-sm active">
                        <input type="radio" name="db_type" id="option1" value="0" autocomplete="on" checked> Create new Database
                    </label>
                    <label class="btn btn-secondary btn-sm">
                        <input type="radio" name="db_type" id="option2" value="1" autocomplete="off"> Upload existing Database
                    </label>
                </div>
            </div>

            <div class="custom-name mb-2" style="display: block;overflow: hidden">
                <div style="width: 75%;float: left">
                    <input required type="text" name="db_name" class="form-control" placeholder="Database name" id="new-db-name">
                </div>
                <div class="form-group" style="width: 20%;float: right">
                    <select class="form-control" name="db_extension">
                        <option value=".sqlite" selected>.sqlite</option>
                        <option value=".db">.db</option>
                    </select>
                </div>
            </div>

            <div class="custom-file mb-2" style="display: none">
                <input type="file" name="db_file" accept=".db,.sqlite" class="custom-file-input" id="validatedCustomFile">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div>


            <div class="col-auto text-center">
                <button type="submit" name="setup" class="btn btn-success btn-block">Create</button>
                <a href="/login" class="btn btn-info btn-block">Go to login page</a>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on('change', 'input[name=db_type]', function (event) {
        var val = parseInt($(this).val());
        var input = $('input[type=file]');
        var input_name = $('input[name=db_name]');
        if(val){
            $('.custom-name').hide()
            $('.custom-file').show()
        }else{
            $('.custom-file').hide()
            $('.custom-name').show()
        }
        input.prop('required' , val);
        input_name.prop('required' , !val);
    });
</script>
