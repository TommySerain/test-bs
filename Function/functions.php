<?php 

function displayArray(array $array): void {
    foreach ($array as $line) { ?>
        <option value="<?php echo $line['idClient'] ?>"><?php echo $line['raisonSociale'] ?></option>
    <?php
    }
}