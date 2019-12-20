</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="sidebar">
<div class="block">
<h3>Login Form</h3>
<br>
<?php if(isLoggedin()): ?>
<div class="userdata">
<strong>Welcome, <?php echo getUser()['username']; ?></strong>
</div>
<br>
<form role="form" method="post" action="logout.php">
<button  name="do_logout" type="submit"  class="btn btn-primary">Logout</button>
</form>
<?php else : ?>
<form class="form-signin" method="post" action="login.php">
        <label class="sr-only">Username</label>
        <input name="username" type="text"  class="form-control" placeholder="Email address" required autofocus>
        <label  class="sr-only">Password</label>
        <input  name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="do_login" class="btn btn-primary " type="submit">Login</button> <a href ="register.php" class="btn btn-default">Create Account</a>
      </form>
	  <?php endif; ?>
 </div>
 <div class="block">
 <h3>Categories</h3>
 <div class="list-group">
 <a href="topics.php" class="list-group-item <?php echo is_active(null);?>">All Topics<span class="badge pull-right"></span></a>
 <?php foreach(getCategories() as $category) :?>
 <a href ="topics.php?category=<?php echo $category->id;?>" class ="list-group-item <?php echo is_active($category->id);?>"><?php echo $category->name;?></a>
 <?php endforeach; ?>
 </div>
 </div>
 </div>
    </div>
    </div>
    </div>
	<!-- /.container -->
	 
	 <div class=" row footer">
	    <div class="container">
	       <p>Salman Tariq Khan &copy; 2017, All Rights Reserved</p>
	    </div>
	  </div>
  </body>
</html>