<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12">
            <h2>Cargar nueva revista</h2>
            <form action="save-magazine.php" method="post" >
                <input type="text" class="form-control"  name="name">
                <textarea type="text" class="form-control"  name="description"></textarea>
                <select name="category_id" class="form-control" >
                    <option value="1">la plaza</option>
                    <option value="2">construir</option>
                </select>
                <input type="date" name="relevant_month" class="form-control" ></input>
                <input type="checkbox" name="enabled" class="form-control" value="1"><label for="enabled">Enabled</label></input>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>