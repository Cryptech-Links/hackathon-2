<?php
/**
 * Set of PHP functions that fetches students from an endpoint, sorts them and returns a student at a given position
 *
 * @return array
 */
function getStudents(): array
{
    $curl = curl_init('https://d68b3d3a-38f9-4da4-9acf-5b4a29ccc098.mock.pstmn.io/students');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($curl), true);
    return $response['data'];
}

function sortStudents(array $students): array
{
    // edit the code below

    $keys = array_column($students, 'averageScore');
    array_multisort($keys, SORT_DESC, $students);
    return $students;
}

function findStudentByPosition(array $students, int $position): array
{
    // edit the code below

    return   $students[$position-=1];

}

$students = getStudents();

print_r(sortStudents($students));

print_r(findStudentByPosition($students, 3));

//print_r(json_encode(getStudents()));

