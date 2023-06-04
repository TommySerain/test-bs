<form class="row mt-5" action="" method="POST">
        <div class="col-6 mx-auto mt-4">
            <label for="sender">Expéditeur</label>
            <select name="sender" id="sender" class="form-control border-2 border-danger rounded-2 bg-success text-white" required>
                <?php
                foreach ($allClients as $client) { ?>
                    <option value="<?php echo $client['idClient'] ?>"><?php echo $client['raisonSociale'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6 mx-auto mt-4">
            <label for="recipient">Destinataire</label>
            <select name="recipient" id="recipient" class="form-control border-2 border-danger rounded-2 bg-success text-white" required>
                <?php
                foreach ($allClients as $client) { ?>
                    <option value="<?php echo $client['idClient'] ?>"><?php echo $client['raisonSociale'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-4 mt-4">
            <label for="number">Nombre de colis</label>
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="number" id="number" required>
        </div>
        <div class="col-4 mt-4">
            <label for="weight">Poids de l'expédition</label>
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="weight" id="weight" required>
        </div>
        <div class="col-4 mt-auto">
            <div>
                <label for="taxes-sender">Taxes payées par l'expéditeur</label>
                <input type="radio" name="taxes" id="taxes-sender" value="1" required>
            </div>
            <div>
                <label for="taxes-recipient">Taxes payées par le destinataire</label>
                <input type="radio" name="taxes" id="taxes-recipient" value="2" required>
            </div>
        </div>
        <input class="btn btn-success mt-4 col-3 mx-auto border-2 border-danger" type="submit" value="Calculer">
    </form>