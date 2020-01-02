<div class="container-fluid">
			      <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php

						//$user = New User();
						//$user->username = "shiv18060";
						//$user->password = "kitty123";
						//$user->first_name = "Shiv";
						//$user->last_name = "Chohan";

						//$user->create();
//
//
//						$found_user = User::find_user_by_id(4);
//						$found_user->username = "Amisha";
//						$found_user->password = "wsedrf11";
//						$found_user->first_name = "Amisha";
//						$found_user->last_name = "Chohan";
//						$found_user->update();

//						$user = User::find_user_by_id(2);
//						$user->delete();

//						$user = User::find_user_by_id(3);
//						$user->last_name = "Williams";
//						$user->save();
//
//						$user = New User();
//						$user->username = "dipti0510";
//						$user->password = "dipti123";
//						$user->first_name = "Dipti";
//						$user->last_name = "Chohan";
//						$user->save();

                        $users = User::find_all();

                        foreach ($users as $user) {
                            echo $user->username;
                        }

						?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
