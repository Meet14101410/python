<?php

class HaridwarInfoSystem {
    private $city_facts;
    private $points_of_interest;

    public function __construct() {
        $this->city_facts = [
            "Location" => "Uttarakhand, India",
            "Population" => "Approx. 230,000 (2023)",
            "Known For" => "Hindu pilgrimage site, Ganga Aarti, and temples"
        ];
        
        $this->points_of_interest = [
            [
                "name" => "Har Ki Pauri",
                "type" => "Ghat",
                "description" => "The most sacred ghat in Haridwar, known for the evening Ganga Aarti."
            ],
            [
                "name" => "Mansa Devi Temple",
                "type" => "Religious Site",
                "description" => "A popular temple on a hilltop, accessible by ropeway."
            ],
            [
                "name" => "Chandi Devi Temple",
                "type" => "Religious Site",
                "description" => "Another hilltop temple dedicated to Goddess Chandi."
            ]
        ];
    }

    public function getCityFact($fact_name) {
        if (isset($this->city_facts[$fact_name])) {
            return "<strong>" . htmlspecialchars($fact_name) . "</strong>: " . htmlspecialchars($this->city_facts[$fact_name]);
        } else {
            return "Fact not found: " . htmlspecialchars($fact_name);
        }
    }

    public function searchPointsOfInterest($search_term) {
        $found_pois = [];
        $lower_search_term = strtolower($search_term);

        foreach ($this->points_of_interest as $poi) {
            if (strpos(strtolower($poi["name"]), $lower_search_term) !== false || strpos(strtolower($poi["type"]), $lower_search_term) !== false) {
                $found_pois[] = $poi;
            }
        }
        return $found_pois;
    }
}

$info_system = new HaridwarInfoSystem();

echo "<h2>City Facts</h2>";
echo "<p>" . $info_system->getCityFact("Population") . "</p>";
echo "<p>" . $info_system->getCityFact("Known For") . "</p>";

echo "<h2>Searching for 'Temple'</h2>";
$temple_results = $info_system->searchPointsOfInterest("Temple");
if (!empty($temple_results)) {
    foreach ($temple_results as $result) {
        echo "<p><strong>Name</strong>: " . htmlspecialchars($result["name"]) . "</p>";
        echo "<p><strong>Type</strong>: " . htmlspecialchars($result["type"]) . "</p>";
        echo "<p><strong>Description</strong>: " . htmlspecialchars($result["description"]) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No matching points of interest found.</p>";
}

?>
