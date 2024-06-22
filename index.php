<?php require_once "util/db.php"; 
 $conn=connexion();
 //recuperation des 4 dernieres articles
 $query = "SELECT * FROM `articles` ORDER BY id DESC LIMIT 4";
 $statement =$conn ->prepare($query);
 $statement ->execute();
 $resultats = $statement -> fetchALL(PDO::FETCH_ASSOC);
//  echo"<pre>";
//  var_dump($resultats);
//  echo"</pre>";
//  die;
 
 ?>

<!doctype html>
<html lang="en">

  <title>Bienvenue | sur mon blog      </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <?php include 'layouts/header.php';?>
  </header>
  <div>
 
  <?php include 'layouts/slideshow.php';?>
</div>
  

  <main class ="container mt-5"> 
    <div class="row col-md-12">
        <div class="col-md-8">
            <h3>Mes derniere articles</h3>
            <?php foreach ($resultats as $article): ?>
             <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="<?= $article['image']; ?>"  class="img-fluid rounded-start" alt="Card title">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"> <?= $article['titre']; ?></h5>
                      <p class="card-text">
                        <!-- <?= $article['contenu']; ?> -->
                        <?php
                        $extrait = (strlen($article['contenu'])>100 ) ? substr($article['contenu'],0,100).'...':$article['contenu']. '...';
                        echo"$extrait";
                        ?>


                      </p>
                      <p class="card-text">
                        <small class="text-muted">
                       <?= $article['date_publication']; ?></small></p>
                         <!-- <p class="card-text">
                            <small class="text-muted">
                             10/10/2023
                           </small></p> -->
       
                   <p class ="card-text">
                      <strong>Auteur : </strong><?= $article['auteur']; ?>
                    </p>
                    <p class ="card-text">
                        <a href ="#" class ="btn btn-danger btn-sn">En savoir plus</a>
                        
                    </p>


                    </div>
                  </div>
                </div>
               </div>   
            
            <?php endforeach ?>
            <nav aria-label="Page navigation">
              <ul class="pagination    ">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
            </div>
            <div class="col-md-4">
              <h3>A propros de l'auteur</h3>
              <img src="images/img.jpg" width= "300" class="rounded mx-auto d-block"><img/>
              <h2 class ="text-center">Bassirou Kane</h2>
              <div class="ratio ratio-16x9">
              <iframe width="853" height="480" src="https://www.youtube.com/embed/pmvUg-ZXoz8" title="Korité 2023: Ousmane SONKO envoie un message à Macky Sall" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

            
        </div>
    </div>

  
  </main>
   <footer class ="bg-dark mt-5" style = "height:400px"> 
   <?php include 'layouts/footer.php';?>

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