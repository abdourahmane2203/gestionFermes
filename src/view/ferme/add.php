<form action="add" method="post">
    <div class="form-group">
        <label for="nom" class="control-label">Nom de la ferme:</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <input type="submit" name="add" class="btn btn-success">
    </div>
</form>

<p><?php if (isset($result_sql))
        echo $result_sql;
?></p>
