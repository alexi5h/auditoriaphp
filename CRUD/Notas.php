<!doctype html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>

</head>
<body>
<header>
    <h1>Ingresar Notas</h1>
</header>
<form class='Notas' >
    <div><label>Id Nota:</label><input type ="text" name="Materia" value=''  maxlength="10"></div>
    <div><label>Nota:</label><input type ="text" name="Nom_materia" value=''   maxlength="5"></div>
    <div><label>Materias:</label><select>
        <optgroup >
        <option selected value="0"> Selecionar Materia </option>
        <option value="1">Programacion</option>
        <option value="2">Administracion de Sistemas</option>
        <option value="3">Automatas</option>
    </optgroup></select></div>
    <div><input type="submit"></div>
    <div><input type="reset" ></div>

</form>
</body>
</html>