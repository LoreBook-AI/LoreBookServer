interface hability {
    name: string;
    score: number;
    description: string;
}

interface habilityScore {
    charisma: hability;
    strenght: hability;
    dexterity: hability;
    wisdom: hability;
    intelligence: hability;
    constitution: hability;
}

interface weapon {
    name: string;
    damageDice: number;
    description: string;
}

interface tool {
    name: string;
    description: string;
}

interface language {
    name: string;
    description: string;
}

interface armor {
    name: string;
    category: string;
    description: string;
}

interface skill {
    name: string;
    hability: hability;
    description: string;
}

interface proficiency {
    weapon: weapon;
    tool: tool;
    language: language;
    armor: armor;
    skill: skill;
}

interface Race {
    name: string;
    habilityScoreImprovements: habilityScore;
    age: number;
    tendency: string;
    size: string;
    moveSpeed: number;
    darkVision: boolean;
    proficiency: proficiency;
}

interface subRace {
    parentRace: Race;
    habilityScoreImprovements: habilityScore;

}


//implementation


const charisma: hability = {
    description: "this is what makes your char handsome and likeable",
    name: "charisma",
    score: 17
}

const strenght: hability = {
    description: "this is what makes your char strong and hot",
    name: "strenght",
    score: 10
}

const wisdom: hability = {
    description: "this is what makes your char wise",
    name: "wisdom",
    score: 10
}

const dexterity: hability = {
    description: "this is what makes your char swift",
    name: "dexterity",
    score: 14
}

const intelligence: hability = {
    description: "this is what makes your char smart",
    name: "intelligence",
    score: 13
}

const funcaozinhaDosCria = (a: number, b: number): number => {
    const soma: number = a + b
    return soma;
}

funcaozinhaDosCria(1, 2);

const constitution: hability = {
    description: "this is what makes your char healthy and tanky",
    name: "constitution",
    score: 8
}


function cadastrarHabilidade(argument: string): hability {
    const constitution: hability = {
        description: "this is what makes your char healthy and tanky",
        name: argument,
        score: 8
    }
    return constitution;
}

console.log(cadastrarHabilidade("constitution"))

const newHabilityScore: habilityScore = {
    charisma: charisma,
    strenght: strenght,
    dexterity: dexterity,
    wisdom: wisdom,
    intelligence: intelligence,
    constitution: constitution
}

const newLanguage: language = {
    description: "abyssal language from demons",
    name: "abissal"
}

const newProficience: proficiency = {
    armor: null,
    language: newLanguage,
    skill: null,
    tool: null,
    weapon: null,
}

const newRace: Race = {
    name: "teste",
    habilityScoreImprovements: newHabilityScore,
    age: 15,
    tendency: "chaotic-evil",
    size: "Medium",
    moveSpeed: 30,
    darkVision: true,
    proficiency: newProficience
}


const newSubRace: subRace = {
    parentRace: newRace,
    habilityScoreImprovements: newHabilityScore
}

console.log(newRace, newSubRace)
