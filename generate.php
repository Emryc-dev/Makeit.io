<?php
 require_once 'db.php';

 $erreur = '';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nom = $_POST['nom'];
    $birthday = $_POST['date_de_naissance'];
    $birthday_lieu = $_POST['lieu_de_naissance'];
    $residence = $_POST['lieu_de_residence'];
    $telephone = $_POST['telephone'];
    $sexe = $_POST['sexe'];
    $niv = $_POST['niveau'];
    $mat = $_POST['matricule'];
    $special = $_POST['specialite'];
    $etab = $_POST['etablissement'];
    $img = $_POST['photo'];

    $maxsize = 2 * 1024 * 1024; //2Mo octets
    $type = ['photo/jpeg', 'photo/png', 'photo/gif']; //Définition du type de fichier à importer

    if(empty($nom) ||empty($birthday) || empty($birthday_lieu) || empty($residence) || empty($telephone) ||empty($sexe) || empty($niv) || empty($mat) || empty($special) ||empty($etab) || empty($img)){
        $erreur = "Tous les champs sont obligatoires !";
    }elseif(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){//Vérification de la taille de l'image importer
        $fileSize = $_FILES['photo']['size'];
        $fileTmp = $_FILES['photo']['tmp_name'];
        $fileType = mime_content_type($fileTmp);

        //vérifions si la taille est ok
        if($fileSize > $maxsize){
            $erreur = "You can't upload a file that size is over 2Mo!";
        }elseif(!in_array($fileType, $type)){
            $erreur = " Just the files of type JPG, PNG and GIF are allowed";
        }
    }else{
        $stmt = $pdo->prepare("INSERT INTO users(nom, date_de_naissance, lieu_de_naissance, lieu_de_residence, telephone, sexe, niveau, matricule, specialite, etablissement, photo) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$nom, $birthday, $birthday_lieu, $residence, $telephone, $sexe, $niv, $mat, $special, $etab, $img]);
        $newuser = $pdo->lastInsertId();
        $_SESSION['users'] = [
            'id_user' => $newuser,
            'nom' => $nom,
            'date_de_naissance' => $birthday,
            'lieu_de_naissance' => $birthday_lieu,
            'lieu_de_residence' => $residence,
            'telephone' => $telephone,
            'sexe' => $sexe,
            'niveau' => $niv,
            'matricule' => $mat,
            'specialite' => $special,
            'etablissement' => $etab,
            'photo' => $img,
        ];

        header("location: view.php");
        exit();
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makit.io/generate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        form{
            width: 60%;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center">
        <form action="" method="post" class="form-group bg-white border-0 rounded-3 shadow-sm p-4 text-center">
            <?php if(!empty($erreur)):?>
                <p class="alert alert-danger"><?php echo htmlspecialchars($erreur); ?></p>
            <?php endif;?>
            <h3 class="text-success">Enter your informations here</h3>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="nom" class="me-3">Names: </label>
                <input type="text" name="nom" id="nom" placeholder="Votre nom complet..." class="form-control" required>
            </div>
            <div class="mt-3 mb-3 d-flex justify-content-center align-items-center">
                <label for="date" class="me-3">Born: </label>
                <input type="date" name="date_de_naissance" id="date" class="form-control" required>
                <label for="lieu" class="ms-2 me-2">at</label>
                <input type="text" name="lieu_de_naissance" placeholder="ex: Douala..." class="form-control" required>
            </div>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="tel" class="form-label">Contact:</label>
                <input type="tel" name="telephone" id="tel" class="form-control ms-3" required>
                <label for="sexe" class="form-label ms-2 me-2">Sexe:</label>
                <input type="text" name="sexe" id="sexe" class="form-control" required>
                <label for="mat" class="form-label ms-2 me-2">Matricule: </label>
                <input type="text" name="matricule" id="mat" class="form-control" required>
            </div>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="choix" class="form-label me-2 d-flex">Resident city: </label>
                <input list="resid" class="form-control" id="choix" name="lieu_de_residence">
                <datalist id="resid" class="form-control d-none">
                    <option value="Bonaberi">Douala, Bonaberi</option>
                    <option value="Akwa">Douala, Akwa</option>
                    <option value="Dogbong">Douala, Dogbong</option>
                    <option value="Makepe">Douala, Makepe</option>
                    <option value="Bepanda">Douala, Bepanda</option>
                    <option value="Deido">Douala, Deide</option>
                    <option value="Village">Douala, village</option>
                    <option value="Logbessou">Douala, logbessou</option>
                </datalist>
            </div>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="spec" class="form-label me-3">Speciality: </label>
                <input type="text" name="specialite" placeholder="Votre filière" class="form-control" required>
                <label for="niveau" class="form-label me-2 ms-2">Level</label>
                <input type="number" name="niveau" class="form-control" required>
            </div>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="etab" class="form-label me-3">School: </label>
                <select name="etablissement" id="etab" class="form-control">
                    <option value="IUT">Institut Uniersitaire des Technologies de Douala</option>
                    <option value="IUC">Institut Uniersitaire de la Cote</option>
                    <option value="IUGET">Institut Uniersitaire de Gestion et blablabala je m'en fou</option>
                </select>
            </div>
            <div class="mt-3 mb-3 d-flex align-items-center">
                <label for="image" class="form-label me-2">Your photo:</label>
                <input type="file" name="photo" id="image" class="form-control" accept="photo/*" required>
            </div>
            <input type="submit" value="Generate" class="btn btn-success">
            <a href="index.php">HOME</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>