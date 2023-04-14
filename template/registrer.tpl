<div class="col-md-3">


</div>


<div class="col-md-6">
        <h3 style="color:{$color};">JOIN NOW</h3>

        <form method="post" action="controllers/actions_board.php">
            <strong style="color:{$color}">Username</strong>
            <input type="text" name="usuario" class="form-control"/></br>
            <strong style="color:{$color}" >Password</strong>
            <input type="password" name="clave" class="form-control"/></br>
            <strong style="color:{$color}">Email</strong>
            <input type="text" name="email"  class="form-control"/></br>
            <strong style="color:{$color}">Name</strong>
            <input type="text" name="name"  class="form-control"/></br>
            <strong style="color:{$color}" >Last Name</strong>
            <input type="text"  name="last_name" class="form-control"/></br>
            <strong style="color:{$color}" >Wirite a micro bio</strong>
            <textarea class="form-control" name="bio">

            </textarea>
            <input type="hidden" name="action" value="create_user"></br>
            <div style="text-align:center;">
                <button class="btn btn-danger">join now</button>
            </div>
            
        </form>



</div>