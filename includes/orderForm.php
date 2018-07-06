<?php
$html->FormBegin("enctype=\"multipart/form-data\"");
$html->TextField("Number", $pch->Number, $enumber);
$html->TextField("Total", $pch->Total, $etotal);
$html->TextField("DeliveryCharge", $pch->DeliveryCharge, $edeliveryCharge);
$html->TextField("Vat", $pch->Vat, $evat);
$html->TextField("Discount", $pch->Discount, $ediscount);
$sm = new paymentMethod();
$html->SelectField("PaymentMethodId", $sm->Select(),$pch->PaymentMethodId, $epaymentMethodId);
$html->TextArea("Address", $pch->Address, $eaddress);
$html->Submit("submit", "Confirm Final Last");
$html->FormEnd();
?>