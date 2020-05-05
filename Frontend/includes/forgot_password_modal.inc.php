<?php
    require 'connection.inc.php';

    echo    '<form action="includes/password_change.inc.php" method="post">';
    echo        '<div class="form-group"><label class="small mb-1" name="email" for="inputEmailAddress">Email</label><input class="form-control py-4" type="email" aria-describedby="emailHelp" name="email"  placeholder="Enter email address" required></div>';
    echo        '<div class="form-row">';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" name="pass" for="inputPassword">Password</label><input class="form-control py-4" type="password" name="pass" placeholder="Enter password" required></div>';
    echo            '</div>';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" name="pass_confirm" type="password" placeholder="Confirm password" required></div>';
    echo            '</div>';
    echo        '</div>';
    echo        '<div class="form-group mt-4 mb-0"><button class="btn btn-block" name="pass-submit" type="submit" style="background-color: #a8fdcc"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></button></div>';
    echo    '</form>';