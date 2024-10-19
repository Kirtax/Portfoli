<?php 

    //Joan Villalba | 24 novembre | Crea un formulari de contacte

    require_once 'Validador.php';


    $nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : null;
    $cognom = isset($_REQUEST['cognom']) ? $_REQUEST['cognom'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $sexe = isset($_REQUEST['sexe']) ? $_REQUEST['sexe'] : null;
    $idioma = isset($_REQUEST['idioma']) ? $_REQUEST['idioma'] : null;
    $carrer = isset($_REQUEST['carrer']) ? $_REQUEST['carrer'] : null;
    $numero = isset($_REQUEST['numero']) ? $_REQUEST['numero'] : null;
    $ciutat = isset($_REQUEST['ciutat']) ? $_REQUEST['ciutat'] : null;
    $provincia = isset($_REQUEST['provincia']) ? $_REQUEST['provincia'] : null;
    $codipostal = isset($_REQUEST['codipostal']) ? $_REQUEST['codipostal'] : null;
    $informacio = isset($_REQUEST['informacio']) ? $_REQUEST['informacio'] : null;
    
    
    $errores = array();
    
    
    if (isset($_POST['envia'])) {

        //Nom
    
        if (validarLlargada5($nom)) {
            $errores["nom"] = 'El camp nom ha de tenir almenys 5 caràcters.';
        }
    
        if (validarNoBuit($nom)) {
            $errores["nom"] = 'El camp nom no pot ser buit.';
        }

        if (validarNoNumeric($nom)){
            $errores["nom"] = 'El camp nom no pot ser numeric.';
        }

        //Cognom

        if (validarLlargada5($cognom)) {
            $errores["cognom"] = 'El camp cognom ha de tenir almenys 5 caràcters.';
        }

        if (validarNoBuit($cognom)) {
            $errores["cognom"] = 'El camp cognom no pot ser buit.';
        }

        if (validarNoNumeric($cognom)){
            $errores["cognom"] = 'El camp cognom no pot ser numeric.';
        }

        //Email
    
        if (validarEmail($email)) {
            $errores["email"] = 'El camp email es incorrecte.';
        }

        //Carrer

        if (validarLlargada5($carrer)) {
            $errores["carrer"] = 'El camp carrer ha de tenir almenys 5 caràcters.';
        }

        if (validarNoBuit($carrer)) {
            $errores["carrer"] = 'El camp carrer no pot ser buit.';
        }

        //Numero

        if (!validarNoNumeric($numero)){
            $errores["numero"] = 'El camp numero ha de ser numeric.';
        }

        if (validarNoBuit($numero)) {
            $errores["numero"] = 'El camp numero no pot ser buit.';
        }

        //Ciutat

        if (validarLlargada3($ciutat)) {
            $errores["ciutat"] = 'El camp ciutat ha de tenir almenys 3 caràcters.';
        }

        if (validarNoBuit($ciutat)) {
            $errores["ciutat"] = 'El camp ciutat no pot ser buit.';
        }

        //Provincia

        if (empty($provincia)) {
            $errores["provincia"] = 'Selecciona un provincia.';
        }

        //Codi Postal

        if (!validarNoNumeric($codipostal)){
            $errores["codipostal"] = 'El camp codi postal ha de ser numeric.';
        }

        if (validarNoBuit($codipostal)) {
            $errores["codipostal"] = 'El camp codi postal no pot ser buit.';
        }

        //Informació

        if (!validarInformacio($informacio)) {
            $errores["informacio"] = 'El camp informació ha de tindre més de 4 carácters i com a molt 256.';
        }

        // Gènere
        if (!isset($_REQUEST['genere'])) {
            $errores["genere"] = 'Selecciona un gènere.';
          }
  
        // Idioma
        if (empty($idioma)) {
            $errores["idioma"] = 'Selecciona un idioma.';
        }

    
        //Login

        if (!$errores) {
            header('Location: ResultatSenseEstil.php');
            exit;
        }
    }
    ?>
    <html>
    <head>
       <title> Validacions de formulari </title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form method="post" action="">
    
            <label> Nom </label>
            <br>
            <?php if ($errores && isset($errores["nom"])) { ?> <p style="color:red;"><?php echo $errores["nom"]; ?></p> <?php } ?>
            <input type="text" name="nom" value="<?php echo $nom ?>" />

            <br>
            <br>

            <label> Cognom </label>
            <br>
            <?php if ($errores && isset($errores["cognom"])) { ?> <p style="color:red;"><?php echo $errores["cognom"]; ?></p> <?php } ?>
            <input type="text" name="cognom" value="<?php echo $cognom ?>" />

            <br>
            <br>

            <label> E-mail </label>
            <br>
            <?php if ($errores && isset($errores["email"])) { ?> <p style="color:red;"><?php echo $errores["email"]; ?></p> <?php } ?>
            <input type="text" name="email" value="<?php echo $email ?>" />

            <br>
            <br>

            <label for="genere">Génere:</label><br>

            <?php if ($errores && isset($errores["genere"])) { ?> <p style="color:red;"><?php echo $errores["genere"]; ?></p> <?php } ?>

            <input type="radio" id="masculi" name="genere" value="Masculí">
            <label for="masculi">Masculí</label><br>

            <input type="radio" id="femeni" name="genere" value="Femení">
            <label for="femeni">Femení</label><br>

            <input type="radio" id="no_binari" name="genere" value="No-Binari">
            <label for="no_binari">No-Binari</label><br>

            <input type="radio" id="agenere" name="genere" value="Agènere">
            <label for="agenere">Agènere</label><br>

            <input type="radio" id="bigenere" name="genere" value="Bigènere">
            <label for="bigenere">Bigènere</label><br>

            <input type="radio" id="genere_fluid" name="genere" value="Gènere Fluid">
            <label for="genere_fluid">Gènere Fluid</label><br>

            <input type="radio" id="neurogenere" name="genere" value="Neurogènere">
            <label for="neurogenere">Neurogènere</label><br>

            <input type="radio" id="pangenere" name="genere" value="Pangènere">
            <label for="pangenere">Pangènere</label><br>

            <input type="radio" id="altres" name="genere" value="Altres">
            <label for="altres">Altres</label>

            <br>
            <br>

            <label for="idioma">Idioma:</label><br>

            <?php if ($errores && isset($errores["idioma"])) { ?> <p style="color:red;"><?php echo $errores["idioma"]; ?></p> <?php } ?>

            <select id="idioma" name="idioma">
                <option value="" disabled selected>Escull</option>
                <option value="catala">Català</option>
                <option value="espanol">Español</option>
                <option value="angles">Anglès</option>
            </select>


            <br>
            <br>

            <label> Carrer </label>
            <br>
            <?php if ($errores && isset($errores["carrer"])) { ?> <p style="color:red;"><?php echo $errores["carrer"]; ?></p> <?php } ?>
            <input type="text" name="carrer" value="<?php echo $carrer ?>" />

            <br>
            <br>

            <label> Numero </label>
            <br>
            <?php if ($errores && isset($errores["numero"])) { ?> <p style="color:red;"><?php echo $errores["numero"]; ?></p> <?php } ?>
            <input type="text" name="numero" value="<?php echo $numero ?>" />

            <br>
            <br>

            <label> Ciutat </label>
            <br>
            <?php if ($errores && isset($errores["ciutat"])) { ?> <p style="color:red;"><?php echo $errores["ciutat"]; ?></p> <?php } ?>
            <input type="text" name="ciutat" value="<?php echo $ciutat ?>" />

            <br>
            <br>

            <label> Provincia </label>
            <br>
            <?php if ($errores && isset($errores["provincia"])) { ?> <p style="color:red;"><?php echo $errores["provincia"]; ?></p> <?php } ?>
            
            <select id="provincia" name="provincia">
                <option value="" disabled selected>Escull</option>
                <option value="alaba">Àlaba</option>
                <option value="alicant">Alacant</option>
                <option value="albacete">Albacete</option>
                <option value="almeria">Almeria</option>
                <option value="asturies">Astúries</option>
                <option value="avila">Àvila</option>
                <option value="badajoz">Badajoz</option>
                <option value="illes_balears">Illes Balears</option>
                <option value="biscaia">Biscaia</option>
                <option value="barcelona">Barcelona</option>
                <option value="burgos">Burgos</option>
                <option value="caceres">Càceres</option>
                <option value="cadis">Cadis</option>
                <option value="cantabria">Cantàbria</option>
                <option value="castello">Castelló</option>
                <option value="ceuta">Ceuta</option>
                <option value="ciudad_real">Ciudad Real</option>
                <option value="conca">Conca</option>
                <option value="cordova">Còrdova</option>
                <option value="corunya">La Corunya</option>
                <option value="girona">Girona</option>
                <option value="granada">Granada</option>
                <option value="guadalajara">Guadalajara</option>
                <option value="guipuscoa">Guipúscoa</option>
                <option value="huelva">Huelva</option>
                <option value="jaen">Jaén</option>
                <option value="lleo">Lleó</option>
                <option value="lleida">Lleida</option>
                <option value="lugo">Lugo</option>
                <option value="madrid">Madrid</option>
                <option value="malaga">Màlaga</option>
                <option value="melilla">Melilla</option>
                <option value="murcia">Múrcia</option>
                <option value="navarra">Navarra</option>
                <option value="osca">Osca</option>
                <option value="ourense">Ourense</option>
                <option value="palencia">Palència</option>
                <option value="las_palmas">Las Palmas</option>
                <option value="pontevedra">Pontevedra</option>
                <option value="la_rioja">La Rioja</option>
                <option value="salamanca">Salamanca</option>
                <option value="santa_cruz_tenerife">Santa Cruz de Tenerife</option>
                <option value="saragossa">Saragossa</option>
                <option value="segovia">Segòvia</option>
                <option value="sevilla">Sevilla</option>
                <option value="soria">Sòria</option>
                <option value="tarragona">Tarragona</option>
                <option value="terol">Terol</option>
                <option value="toledo">Toledo</option>
                <option value="valencia">València</option>
                <option value="valladolid">Valladolid</option>
                <option value="zamora">Zamora</option>
            </select>


            <br>
            <br>

            <label> Codi Postal </label>
            <br>
            <?php if ($errores && isset($errores["codipostal"])) { ?> <p style="color:red;"><?php echo $errores["codipostal"]; ?></p> <?php } ?>
            <input type="text" name="codipostal" value="<?php echo $codipostal ?>" />

            <br>
            <br>

            <label> Informació d'Interés </label>
            <br>
            <?php if ($errores && isset($errores["informacio"])) { ?> <p style="color:red;"><?php echo $errores["informacio"]; ?></p> <?php } ?>
            <textarea name="informacio" rows="4" cols="50"><?php echo $informacio ?></textarea>

            <br>
            <br>
            

            <button type="submit" name="envia">Envia</button>
    
        </form>
    </body>
    </html>