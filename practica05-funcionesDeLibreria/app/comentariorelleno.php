<form name='mensaje' method="POST">
Tema<br>
    <label>
        <input type="text" name="tema" size=30
          value="<?=(isset($_REQUEST['tema']))?$_REQUEST['tema']:''?>" >
    </label><br>
    <br>
    <label>
        Comentario:&nbsp;<textarea name="comentario" rows="4" cols="50"><?=(isset($_REQUEST['comentario']))?$_REQUEST['comentario']:''?></textarea>
    </label>
    <br><br>
<input type="submit" name="orden" value="Detalles">
<input type="submit" name="orden" value="Nueva opinión">
<input type="submit" name="orden" value="Terminar">
</form>
