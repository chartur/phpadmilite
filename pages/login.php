<?php

    if(user()){
        redirect('/home');
    }

    $db = new DB();
    $query = $db->query('select * from users');
    $data = $query->fetchArray(1);
    if(!$data){
        redirect('/setup', ['danger', 'Please setup your configs!']);
    }
?>

<div class="col-12 col-sm-6 offset-sm-3">
    <form class="mt-5" method="post" action="/posts/login">
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
            <div class="col-auto text-center">
                <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
                <a href="/setup" class="btn btn-info btn-block">Or create new user</a>
            </div>
        </div>
    </form>
</div>
