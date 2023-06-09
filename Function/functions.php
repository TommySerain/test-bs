<?php 

function displayArray(array $array, string $value, string $boxDisplay): void {
    foreach ($array as $line) { ?>
        <option value="<?php echo $line[$value] ?>"><?php echo $line[$boxDisplay] ?></option>
    <?php
    }
}