class HaridwarInfoSystem {
    constructor() {
        this.cityFacts = {
            "Location": "Uttarakhand, India",
            "Population": "Approx. 230,000 (2023)",
            "Known For": "Hindu pilgrimage site, Ganga Aarti, and temples"
        };
        
        this.pointsOfInterest = [
            {
                name: "Har Ki Pauri",
                type: "Ghat",
                description: "The most sacred ghat in Haridwar, known for the evening Ganga Aarti."
            },
            {
                name: "Mansa Devi Temple",
                type: "Religious Site",
                description: "A popular temple on a hilltop, accessible by ropeway."
            },
            {
                name: "Chandi Devi Temple",
                type: "Religious Site",
                description: "Another hilltop temple dedicated to Goddess Chandi."
            }
        ];
    }

    getCityFact(factName) {
        if (this.cityFacts.hasOwnProperty(factName)) {
            return `${factName}: ${this.cityFacts[factName]}`;
        } else {
            return `Fact not found: ${factName}`;
        }
    }

    searchPointsOfInterest(searchTerm) {
        const lowerSearchTerm = searchTerm.toLowerCase();
        return this.pointsOfInterest.filter(poi =>
            poi.name.toLowerCase().includes(lowerSearchTerm) ||
            poi.type.toLowerCase().includes(lowerSearchTerm)
        );
    }
}

const infoSystem = new HaridwarInfoSystem();

console.log("City Facts");
console.log(infoSystem.getCityFact("Population"));
console.log(infoSystem.getCityFact("Known For"));

console.log("\nSearching for 'Temple'");
const templeResults = infoSystem.searchPointsOfInterest("Temple");
if (templeResults.length > 0) {
    templeResults.forEach(result => {
        console.log(`Name: ${result.name}`);
        console.log(`Type: ${result.type}`);
        console.log(`Description: ${result.description}`);
        console.log("------------------------");
    });
} else {
    console.log("No matching points of interest found.");
}
