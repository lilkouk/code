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
                      

                      $valeur=234;
                       
                    ?>
                    <br/>
                    <p> <?=$valeur ?> est la valeur de la variable </p>;
                     

                </div>
                <div class="opt">
                  <div><a title="Getting Started" href="https://www-ens.iro.umontreal.ca/~somdaghi/">site web de Ghislain</a>
                    <p>
                        solution     
                        <?php 
                           $descriptorspec = array(
                            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
                            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                            2 => array("file", "error-output.txt", "a") // stderr is a file to write to
                        );$process = proc_open("python3 -m lychrel", $descriptorspec, $pipes);
                        

                        if (is_resource($process)) {
                             // $pipes now looks like this:
                             // 0 => writeable handle connected to child stdin
                             // 1 => readable handle connected to child stdout
                             // Any error output will be appended to error-output.txt
                            
                            // here I build the request to be sent to the fetcher (python)
                            // It will look like this "param=value param2=value2 ..."
                            $request = "";
                            if (isset($_REQUEST)) 
                            {
                              $request=$_GET["fname"];
                                
                               
                                
                                

                        
                                // send to request to the fetcher
                                fwrite($pipes[0], $request . "\n");
                                fclose($pipes[0]);
                            
                                $Data = stream_get_contents($pipes[1]) . "<br>";
                                fclose($pipes[1]);
                        
                                // It is important that you close any pipes before calling
                                // proc_close in order to avoid a deadlock
                                $return_value = proc_close($process);
                            
                                echo "command returned $return_value\n";
                              }
                        
                        }
                           else 
                            {
                              $Data = "No request has been made :(";
                            };
                      
                        // echoed data will "show" in the html code and be displayed by the browser
                        echo "<pre>" . $Data . "</pre>";
                      
                          
                        ?> 
                    


                      </p></div>
                </div>
            </div>

        </div>
    </body>
</html>
