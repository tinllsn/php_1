<?php
session_start();
if (!isset($_SESSION['user'])) header('location: login.php');

$_SESSION['table'] = 'users';

$user = $_SESSION['user'];
$users = include('database/show-users.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link rel="shortcut icon" href="./images/o.jpg" />
    <title>Organic Management System</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/adduser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-5">
                            <h1 class="section_header"> <i class="fa fa-plus"></i> Insert User</h1>
                            <div id="userAddFormContainer">
                                <form action="database/user-add-db.php" method="POST" class="appForm">
                                    <div class="appFormInputContainer">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="appFormInput" id="first_name" name="first_name">
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="appFormInput" id="last_name" name="last_name">
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Email</label>
                                        <input type="text" class="appFormInput" id="email" name="email">
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="password">Password</label>
                                        <input type="password" class="appFormInput" id="password" name="password">
                                    </div>
                                    <!-- <input type="hidden" name="table" value="admin"> -->
                                    <button type="submit" class="appBtn"><i class="fa fa-plus"></i> Add user</button>
                                </form>
                                <?php if (isset($_SESSION['response'])) {
                                    $response_message = $_SESSION['response']['message'];
                                    $is_success = $_SESSION['response']['success'];
                                ?>
                                    <div class="responseMessage">
                                        <p class=" responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                            <?= $response_message ?>
                                        </p>
                                    </div>
                                <?php unset($_SESSION['response']);
                                } ?>
                            </div>

                        </div>
                        <div class="column column-7">
                            <h1 class="section_header"><i class="fa fa-list"></i> List of Users</h1>
                            <div class="section_content">
                                <div class="users">
                                    <p class="userCount"><?= count($users) ?> Users</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($users as $index => $user) { ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td class="firstName"><?= $user['first_name'] ?></td>
                                                    <td class="lastName"><?= $user['last_name'] ?></td>
                                                    <td class="email"><?= $user['email'] ?></td>
                                                    <td class="password"><?= $user['password'] ?></td>
                                                    <td><?= date('M d, Y H:i:s ', strtotime($user['created_at']))  ?></td>
                                                    <td><?= date('M d, Y H:i:s', strtotime($user['updated_at'])) ?></td>
                                                    <td>
                                                        <a href="" class="updateUser"><i class="fa fa-pencil"></i>Edit</a>
                                                        <a href="" class="deleteUser" data-userid="<?= $user['id'] ?>" data-fname="<?= $user['first_name'] ?>" data-lname="<?= $user['last_name'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="./js/script.js"></script>
    <script src="js/jquery/jquery-3.5.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function script() {
            this.initialize = function() {
                    this.registerEvent();
                },

                this.registerEvent = function() {
                    document.addEventListener('click', function(e) {
                        targetElement = e.target;
                        classList = targetElement.classList;

                        if (classList.contains('deleteUser')) {
                            e.preventDefault();
                            userId = targetElement.dataset.userid;
                            fname = targetElement.dataset.fname;
                            lname = targetElement.dataset.lname;
                            fullName = fname + ' ' + lname;

                            if (window.confirm('Are you sure to delete ' + fullName + '?')) {
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        user_id: userId,
                                        f_name: fname,
                                        l_name: lname
                                    },
                                    url: 'database/delete-user.php',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.success) {
                                            if (window.confirm(data.message)) {
                                                location.reload();
                                            }
                                        } else {
                                            window.alert(data.message);
                                        }
                                    }

                                })
                            } else {
                                console.log('Will not delete.')
                            }
                        }

                        if (classList.contains('updateUser')) {
                            e.preventDefault();
                            firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
                            lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
                            email = targetElement.closest('tr').querySelector('td.email').innerHTML;
                            password = targetElement.closest('tr').querySelector('td.password').innerHTML;

                            BootstrapDialog.confirm({
                                title: 'Update ' + firstName + ' ' + lastName,
                                message: '<form>\
                                    <div class="form-group">\
                                        <label for="firstName">FirstName:</label>\
                                        <input type="text" class="form-control" id="firstName" value="'+firstName+'">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for="lastName">LastName:</label>\
                                        <input type="text" class="form-control" id="lastName" value="'+lastName+'">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for="email">Email address:</label>\
                                        <input type="email" class="form-control" id="email" value="'+email+'">\
                                    </div>\
                                </form>',
                                callback: function(isUpdate){
                                    if(isUpdate){
                                        alert('hi i ')
                                    }
                                }
                            })
                        }
                    });
                }
        }

        var script = new script;
        script.initialize();
    </script>

</body>

</html>