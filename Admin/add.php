<?php
require_once('../util/db.php');
$titre ="";
// verification des donnees ont ete envoyees depuis la formulaire
if(isset($_POST['titre']))
$titre = $_POST['titre'];
if(isset($_POST['image']))
$img = $_POST['image'];
if(isset($_POST['contenu']))
$cont = $_POST['contenu'];
if(isset($_POST['date_publication']))
$datePub = $_POST['date_publication'];
if(isset($_POST['auteur']))
$aut = $_POST['auteur'];
if(isset($_POST['catagorie_id']))
$catag = $_POST['catagorie_id'];
if(isset($_POST['statut']))
$stat = $_POST['statut'];
$status = false;
if($titre != ""){
    //1ERE ETAPE RECUPERER LA CONNEXION A LA BDD
    $conn=connexion();

    // 2 eme etape : ecrire la requete
    $query = "INSERT INTO articles
     (titre,image,contenu, date_publication, auteur, catagorie_id,statut) VALUES
      (?,?,?,?,?,?,?)";
      //:3eme preeparer la requete
      $statement = $conn-> prepare($query);
      //4eme excuter la requete
      $data =[$titre,$img,$cont,$datePub,$aut,$catag,$stat];
     if( $statement->execute($data)){
        $status = true;
     }




}


?>
<!doctype html>
<html lang="en">

<head>
  <title>Ajouter une nuvelle article</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <?php include_once "../layouts/header.php" ?>
  </header>
  <main class="container mt-5">
    <h3>Formulaire d'un nouvel article</h3>
    <div class="row col-md-8">
        <?php if($status ==true) : ?>
            <div class="alert alert-success">
            Article ajouté avec succes !
            </div>
            <?php endif; ?>
        
        <form action="" method="post">
        <div class="form-floating mb-3">
         <input name ="titre" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
         <label for="floatingInput">Titre de l'article</label>
     </div>
     <div class="form-floating mb-3">
         <input name ="image" type="text" class="form-control" id="floatingInput1" placeholder="name@example.com">
         <label for="floatingInput">Image l'article</label>
     </div>
     <div class="form-floating">
        <textarea name="contenu" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Contenu de l'article</label>
      </div>
      <div class="form-floating mb-3">
         <input name ="date_publication" type="date" class="form-control" id="floatingInput2" placeholder="name@example.com">
         <label for="floatingInput">Date de publication de l'article</label>
     </div>
     <div class="form-floating">
         <select name="catagorie_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
          <option selected>Choisir une categorie </option>
          <option value="1">Politique</option>
          <option value="2">Actualité</option>
           <option value="3">Sports</option>
          </select>
          <label for="floatingSelect">Categorie de l'article</label>
    </div>
    <div class="form-floating mt-3">
         <input name ="auteur" value="Bassirou kane" type="text" class="form-control" id="floatingInput3" placeholder="name@example.com">
         <label for="floatingInput">Auteur de l'article</label>
     </div>

     <div class="form-check">
       <input class="form-check-input" type="radio" name="statut" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
        Publié
         </label>
     </div>
      <div class="form-check">
      <input class="form-check-input" type="radio" name="statut" id="flexRadioDefault2">
      <label class="form-check-label" for="flexRadioDefault2">
    non publié
       </label>
          </div>
          <div class="d-grid gap-2">
           <button class="btn btn-success" type="submit">
              Ajouter une nouvelle article
            </button>
</div>
 </form>

 </div>

  </main>
  <footer class ="bg-dark mt-5" style = "height:400px"> 
  <?php include_once "../layouts/footer.php" ?>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>