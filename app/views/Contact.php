<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-container {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Ajouter un contact</h2>
        <form id="contactForm">
            <div class="form-group">
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </div>
    <?php if(isset($editList)){?>
     <div class="form-container">
        <h2>Modifier Contact</h2>
        <form action="/editContact" method="post">
             <div class="form-group">
                <label for="lastname">Id:</label>
                <input type="number" id="id" name="id" value="<?= $editList['id'];?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" value="<?= $editList['lastname'];?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" value="<?= $editList['firstname'];?>" required>
            </div>
            <button type="submit">Modifier</button>
        </form>
    </div>
    <?php } ?>
    <div class="form-container">
        <h2>Liste des Contact</h2>
                <?php foreach($list as $listes){?>
                       <p><?=$listes['id'];?>  <?=$listes['firstname'];?> <?=$listes['lastname'];?><a href="/removeContact?id=<?=$listes['id'];?>"> SUPPRIMER </a><a href="/ContactToEdit?id=<?=$listes['id'];?>"> Modifier </a></p>
                <?php }?>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                lastname: document.getElementById('lastname').value,
                firstname: document.getElementById('firstname').value
            };

            fetch('/addContact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                alert('Contact ajouté avec succès!');
                console.log('Réponse:', data);
                document.getElementById('contactForm').reset();
            })
            .catch((error) => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue');
            });
        });
    </script>
</body>
</html>