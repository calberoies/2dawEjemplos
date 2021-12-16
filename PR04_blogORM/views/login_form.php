    <h4>Login</h4>
    <form method="POST">
        <div class="row">
            <div class="col col-md-12 col-xs-12">
                <label for="nombre">Usuario </label>
                <input type="text" id="nombre" class="form-control" name="user" value=<?=$user?>>
            </div>
        </div>
        <div class=row>
            <div class="col col-md-12 col-xs-12">
                <label >Contraseña </label>
                <input  class="form-control" type=password name="password"  value=<?=$password?>>
            </div>
        </div>
        <div class=error><div class=col-12>
            <?=$error ??''?>
        </div></div>
        <div class="row">
            <div class="col col-md-2">
                <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
            </div>
        </div>
    </form>
</div>
