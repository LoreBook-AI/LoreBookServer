import * as proficiency from "./Proficiency.js";

interface Stats {
    level: number;
    xp: number;
    proficiencyBonus: number;
    hitPoints: number;
    temporaryHitPoints: number;
    moveSpeed: number;
    initiative: number;
    inspiration: boolean;
    gold: number;
    passivePerceptio: number;
}

interface AbilityScore {
    charisma: proficiency.Ability;
    strenght: proficiency.Ability;
    dexterity: proficiency.Ability;
    wisdom: proficiency.Ability;
    intelligence: proficiency.Ability;
    constitution: proficiency.Ability;
}

export {
    AbilityScore,
    Stats
}
