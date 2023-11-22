<?php
class Student {
    public $name;
    public $grade;
    public $class;

    public function __construct($name, $grade, $class)
    {
        $this->name = $name;
        $this->grade = $grade;
        $this->class = $class;
    }

    public function getInfo()
    {
        return '<tr>'.'<td>'. $this->name .'</td>'. '<td>'. $this->grade .'</td>'. '<td>'. $this->class .'</td>'.'</tr>';
    }
}

function average($class)
{
    $sum = 0;
    foreach ($class as $student) {
        $sum += $student->grade;
    }
    return count($class) > 0 ? $sum / count($class) : 0;
}

function topStudent($class)
{
    $topStudent = null;
    foreach ($class as $student) {
        if ($topStudent === null || $student->grade > $topStudent->grade) {
            $topStudent = $student;
        }
    }
    return $topStudent;
}

function lowestStudent($class)
{
    $lowestStudent = null;

    foreach ($class as $student) {
        if ($lowestStudent === null || $student->grade < $lowestStudent->grade) {
            $lowestStudent = $student;
        }
    }
    return $lowestStudent;
}

function move(&$sourceArray, &$destinationArray, $student)
{
    $key = array_search($student, $sourceArray, true);
    
    if ($key !== false) {
        unset($sourceArray[$key]);
        $destinationArray[] = $student;
    }
}

$class1A = [
    new Student('Jane Doe', 8, '1A'),
    new Student('George Flint', 6, '1A'),
    new Student('Arthur Bint', 5, '1A'),
    new Student('Morgan Duff', 2, '1A'),
    new Student('Gérard Montois', 6, '1A'),
    new Student('Clétus Levrai', 1, '1A'),
    new Student('Nicolas Frite', 8, '1A'),
    new Student('Renée Dubucher', 6, '1A'),
    new Student('Gabriel Martin', 9, '1A'),
    new Student('Martin Martin', 4, '1A'),
];

$class2B = [
    new Student('John Doe', 8, '2B'),
    new Student('Jean Demaison', 6, '2B'),
    new Student('Alexandra Lasoeur', 7, '2B'),
    new Student('Roger Lelapin', 4, '2B'),
    new Student('Harry Lafleur', 9, '2B'),
    new Student('Nathan Zsyksoski', 7, '2B'),
    new Student('Mohamed Ahrid', 6, '2B'),
    new Student('Shone Troisgalets', 2, '2B'),
    new Student('Logan Dogan', 3, '2B'),
    new Student('Renaud Marchalombre', 5, '2B'),
];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 4</title>
</head>
<body>
    <h3>Class 1A</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Grade</th>
            <th>Class</th>
        </tr>
    <?php 

        foreach($class1A as $student) 
        {
            echo $student->getInfo();
        }

    ?>
    </table>
    <?php echo '<p>Average score of class 1A: ' . average($class2B) . '/10</p>'; ?>
    <h3>Class 2B</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Grade</th>
            <th>Class</th>
        </tr>
    <?php
      foreach($class2B as $student) 
        {
            echo $student->getInfo();
        }
    ?>
    </table>
    <?php echo '<p>Average score of class 2B: ' . average($class2B) . '/10</p>';
    
    $topStudent = topStudent($class1A);
    $lowestStudent = lowestStudent($class2B);

    move($class1A, $class2B, $topStudent);
    move($class2B, $class1A, $lowestStudent);
    
    ?>

    <h3>Class 1A After Move</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Grade</th>
            <th>Class</th>
        </tr>
    <?php 

        foreach($class1A as $student) 
        {
            echo $student->getInfo();
        }

    ?>
    </table>
    <?php echo '<p>Average score of class 1A After Move: ' . average($class2B) . '/10</p>'; ?>
    <h3>Class 2B After Move</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Grade</th>
            <th>Class</th>
        </tr>
    <?php
      foreach($class2B as $student) 
        {
            echo $student->getInfo();
        }
    ?>
    </table>
    <?php echo '<p>Average score of class 2B After Move: ' . average($class2B) . '/10</p>'; ?>

</body>
</html>
