<?php

print '<div class="purchaseSummery">';

print '<div class="left">';
var_dump($pch);
print '</div>';


print '<div class="right">';
$ps = new purchaseStatus();
$table = $ps->Select(" where p.id = ".$pch->Id);
var_dump($table);
print '</div>';

print '</div>';

$pchD = new purchaseDetails();
$table = $pchD->Select(" where pc.id = ".$pch->Id);

print '<div class="purchaseDetails">';
var_dump($table);
print '</div>';

?>