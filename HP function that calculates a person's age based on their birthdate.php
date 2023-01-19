function calculateAge($birthdate) {
    $now = new DateTime();
    $birthdate = new DateTime($birthdate);
    $interval = $now->diff($birthdate);
    return $interval->y;
}



$birthdate = "1995-08-19";
$age = calculateAge($birthdate);
echo "Age: $age";
