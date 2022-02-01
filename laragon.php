<?php
  if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
      case 'info':
        phpinfo(); 
        exit;
      break;
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>

        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Karla';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .opt {
                margin-top: 30px;
            }

            .opt a {
              text-decoration: none;
              font-size: 150%;
            }
            
            a:hover {
              color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title" title="Laragon">Laragon</div>
     
                <div class="info"><br />
                      <?php print($_SERVER['SERVER_SOFTWARE']); ?><br />
                      PHP version: <?php print phpversion(); ?>   <span><a title="phpinfo()" href="/?q=info">info</a></span><br />
                      Document Root: <?php print ($_SERVER['DOCUMENT_ROOT']);
                       ?>
                      <br />
                    <?php 
                       $valeur=25;  
                       print  "la valeur est $valeur"; 

                      
                       
                    ?>
                    <br/>
                    <p> <?=$valeur ?> est la valeur de la variable </p>;
                     

                </div>
                <div class="opt">
                  <div><a title="Getting Started" href="https://www-ens.iro.umontreal.ca/~somdaghi/">site web de Ghislain</a>
                    <p>
                        somda ghislain

                        <form action="serveur.php" method="get">
                          <label for="fname">nombre:</label><br>
                          <input type="text" id="fname" name="fname"><br>
                         
                          <input type="submit">
                          
                          
                        </form>
                        <?php 
                           $descriptorspec = array(
                            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
                            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                            2 => array("file", "error-output.txt", "a") // stderr is a file to write to
                        );$process = proc_open("python3 -m lychrel", $descriptorspec, $pipes);

                        
                        
                        ?> 


                      </p></div>
                </div>
            </div>

        </div>
    </body>
</html>
