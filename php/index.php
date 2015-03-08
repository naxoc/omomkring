<!doctype html>
<html lang="da-DK">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Omomkring</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">

  <h1>Omomkring</h1>

  <form class="about-form" method="post">
    <div class="form-group">
      <textarea class="form-control" name="original" rows="12">Det handler om at smide flere omkring på om og omkring.

I virkeligheden vil ord som ikke som udgangspunkt er irriterende også blive mere irriterende. Eksempler er ombudsmand eller omelet.</textarea>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary go-around" value="Kør omkring omkring!"/>
    </div>
  </form>

  <?php if (!empty($_POST['original'])) : ?>
    <hr/>
    <div class="processed-text">
      <h4>Nu med mere omkring</h4>

      <p>
        <?php print nl2br(preg_replace('@\bom(kring)?@', 'omkring$1', $_POST['original'])); ?>
      </p>
    </div>
  <?php endif; ?>

</div>
</html>
