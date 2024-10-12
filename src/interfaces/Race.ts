
import * as proficiency from './Proficiency.js'
interface Race {
    name: string;
    abilityScoreImprovements: [proficiency.Ability];
    age: number;
    tendency: string;
    size: string;
    moveSpeed: number;
    darkVision: boolean;
    proficiency: [proficiency.proficiency];
    description: string;
}

interface SubRace extends Race {
    abilityScoreImprovements: [proficiency.Ability];
    proficiency: [proficiency.proficiency]
    ability: string;
    description: string;
}

export {
    Race,
    SubRace
}
