<?php
class basket 
{
    public $items;
    public $type;
    public $numbers;
    public $price;

    public function __construct($items, $type, $numbers, $price)
    {
        $this->items = $items;
        $this->type = $type;
        $this->numbers = $numbers;
        $this->price = $price;
    }
    public function getInfo()
    {
        return 'Items: ' . $this->items . '<br>' . 'Numbers: ' . $this->numbers . '<br>' . 'Price per unit: ' . $this->price .' euros'. '<br>';
    }
    public function getTotal()
    {
        return 'Total : '. $this->numbers * $this->price .' euros'.'<br>';
    }
    public function getTax()
    {
        $total =$this->numbers * $this->price ;
        $tax = ($total / 100) * 21;
        $tax2 = ($total / 100) * 6;
        $totalTax = $total + $tax;
        $totalTax2 = $total + $tax2;

        if ($this->type == 'other') 
        {
            return 'Tax 21% : ' . $tax .' euros'.'<br>'."Total with tax: " . $totalTax . " euros".'<br>';
        } 
        else 
        {
            return 'Tax 6% : ' . $tax2 .' euros'.'<br> '."Total with tax: " . $totalTax2 . " euros".'<br>';
        }
    }   
    public function reduction()
    {
        $total =$this->numbers * $this->price ;
        if ($this->type == 'fruit') 
        {
            return 'Reduction 50% : ' . ($total / 100) * 50 .' euros'.'<br>';
        }
        else
        {
            return 'No reduction'.'<br>';
        }
    }
}

$banana = new basket('Bananas', 'fruit', 6, 1);
$apple = new basket('Apples', 'fruit', 3, 1.5);
$wine = new basket('Bottles of wine', 'other', 2, 10); 

echo "<p>". $banana->getInfo() . "</p>";
echo "<p>". $banana->getTotal() . "<br>" . $banana->getTax() . "</p>";
echo "<p>". $banana->reduction() . "</p>";

echo "<p>". $apple->getInfo() . "</p>";
echo "<p>". $apple->getTotal() . "<br>" . $apple->getTax() . "</p>";
echo "<p>". $apple->reduction() . "</p>";

echo "<p>". $wine->getInfo() . "</p>";
echo "<p>". $wine->getTotal() . "<br>" . $wine->getTax() . "</p>";
echo "<p>". $wine->reduction() . "</p>";
?>

