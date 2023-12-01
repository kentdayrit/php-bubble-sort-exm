<?php
class Sorter {
    private $data;

    public function __construct($dataArray) {
        $this->data = $dataArray;
        $this->bubbleSort();
    }

    public function getData() {
        return $this->data;
    }

    private function bubbleSort() {
        $n = count($this->data);

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($this->data[$j] > $this->data[$j + 1]) {
                    $temp = $this->data[$j];
                    $this->data[$j] = $this->data[$j + 1];
                    $this->data[$j + 1] = $temp;
                }
            }
        }
    }

    public function getMedian() {
        $n = count($this->data);
        $mid = (int)($n / 2);

        if ($n % 2 === 0) {
            return ($this->data[$mid - 1] + $this->data[$mid]) / 2;
        } else {
            return $this->data[$mid];
        }
    }

    public function getLargestValue() {
        $n = count($this->data);
        return $this->data[$n - 1];
    }
}

class DataProcessor {
    private $sorter;

    public function __construct($dataArray) {
        $this->sorter = new Sorter($dataArray);
    }

    public function displayResults() {
        $median = $this->sorter->getMedian();
        $largestValue = $this->sorter->getLargestValue();

        echo "Sorted Array: " . implode(', ', $this->sorter->getData()) . "<br>";
        echo "Median: $median<br>";
        echo "Largest Value: $largestValue<br>";
    }
}

$dataArray = [2, 1, 8, 3, 1];
$dataProcessor = new DataProcessor($dataArray);
$dataProcessor->displayResults();
