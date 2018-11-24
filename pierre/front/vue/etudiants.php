<div class="container">
    <h1>
        ICI LA LISTE DES ETUDIANTS
    </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FirstName</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($etudiants as $e) {
                ?>
                <tr>
                    <td><?php echo $e->id; ?></td>
                    <td><?php echo $e->nom; ?></td>
                    <td><?php echo $e->prenom; ?></td>
                    <td>
                        <a href="?page=controle&action=deleteEtudiant&id=<?php echo $e->id; ?>">Supprimer !</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <h2>
            Create Etudiant :
    </h2>
    <form method="post" action="?page=controle&action=createEtudiant">
            <label for="nom">Nom :</label>
            <input id="nom" name="nom" type="text">
            <label for="prenom">Prenom :</label>
            <input id="prenom" name="prenom" type="text">
            <button> Créer !</button>
    </form>
</div>