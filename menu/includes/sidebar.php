            <div class="col-md-4 col-md-push-8">

                <!-- Search Well -->
                <div class="well">
                    <h4>Search Menu</h4>
                    <form action="" method="get">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="searchbtn" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    
                    <!-- /.input-group -->
                </div>

                <!-- Categories Well -->
                <div class="well">
                    <h4>Menu Categories</h4>
                    <div class="row">
<?php
    $tablename = "categories";
    $query = "SELECT * FROM $tablename;";
    $display_cat_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_cat_query)) {
        echo '<div class="col-lg-6"><ul class="list-unstyled">';
        echo '<li><a href="#">'.$row['cat_title'].'</a></li>';
        echo '</ul></div><!-- /.col-lg-6 -->';
    }
?>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>