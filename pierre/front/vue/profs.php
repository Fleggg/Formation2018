<div class="container">
    <h1>
        ICI LA LISTE DES PROFS
    </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FirstName</th>
            <th>E-mail</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($profs as $e) {
                ?>
                <tr>
                    <td><?php echo $e->id; ?></td>
                    <td><?php echo $e->nom; ?></td>
                    <td><?php echo $e->prenom; ?></td>
                    <td><?php echo $e->email; ?></td>
                    <td>
                        <a href="?page=controle&action=deleteProf&id=<?php echo $e->id; ?>">Supprimer !</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <h2>
            Create Prof :
    </h2>
    <form method="post" action="?page=controle&action=createProf">
            <label for="nom">Nom :</label>
            <input id="nom" name="nom" type="text">
            <label for="prenom">Prenom :</label>
            <input id="prenom" name="prenom" type="text">
            <label for="email">E-mail :</label>
            <input id="email" name="email" type="text">
            <button> Créer !</button>
    </form>
</div>